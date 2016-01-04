#!/bin/bash

fich=$1
nbreCarac=$2
separator=$3
cat $fich|while read line; do
  rand=$[$RANDOM % 2 + 1]
  if [[ $rand>1 ]]; then
    #statements
    echo "${line},True"
  else
    echo "${line},False"
  fi
done > fileArtiste.csv
