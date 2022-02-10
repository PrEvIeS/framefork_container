#!/bin/bash
set -e
#first cd current dir
cd "$(dirname "${BASH_SOURCE[0]}")"

export DEFAULT_USER="1000";
export DEFAULT_GROUP="1000";

export USER_ID=`id -u`
export GROUP_ID=`id -g`
export USER=$USER


if [ "$USER_ID" == "0" ];
then
    export USER_ID=$DEFAULT_USER;
fi

if [ "$GROUP_ID" == "0" ];
then
    export GROUP_ID=$DEFAULT_GROUP;
fi

if [ $# -eq 0 ]
  then
    echo "HELP:"
    echo "build - make docker build"
    echo "up - docker up "
    echo "down - docker down"
    echo "run - run in php container from project root"
fi

function runInPhp {
    local command=$@
    echo $command;
    docker exec -i framework su www-data -c "$command"
    return $?
}

function enterInPhp {
    docker exec -it framework_run su www-data
    return $?
}

if [ "$1" == "build" ];
  then
    docker build -t framework .
fi

if [ "$1" == "up" ];
  then
    docker run --rm -v /home/denn/PhpstormProjects/framefork_container:/var/www/html -p 0.0.0.0:80:80 -it --name framework_run -d framework
fi

if [ "$1" == "down" ];
  then
    docker stop framework_run
fi

if [ "$1" == "run" ];
  then
    if [ "$2" == "" ];
        then
        docker exec -it framework_run bash;
        else
        runInPhp "${@:2}"
    fi
fi

if [ "$1" == "in" ];
  then
    enterInPhp "${@:2}"
fi
