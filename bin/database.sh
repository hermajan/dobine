#! /bin/bash
# Script handles database

COMMAND=$1

function help() {
    echo "clean - cleans cache"
    echo "entities - generates entities from database to classes"
    echo "update - updates database schema from entities"
    echo "validate - validates schema"
}

# Cleans cache
function clean() {
    "../vendor/bin/doctrine" orm:clear-cache:metadata
}

# Generates entities from database to classes
function entities() {
    "../vendor/bin/doctrine" orm:convert-mapping --namespace="Entities\\" --force --from-database annotation .
}

# Updates database schema from entities
function update() {
    "../vendor/bin/doctrine" orm:schema-tool:update --dump-sql

    echo -e "\nDo you want to update schema?"
    select structure in "Yes" "No"; do
        case $structure in
            "Yes") php "www/index.php" orm:schema-tool:update --force; break;;
            "No") echo "Nothing was updated!"; break;;
            *) echo "Nothing was updated!"; break;;
        esac
    done
}

# Validates schema
function validate() {
    "../vendor/bin/doctrine" orm:validate-schema
}

if [[ "${COMMAND}" == "" ]]; then
    help
fi

# run command
$COMMAND
