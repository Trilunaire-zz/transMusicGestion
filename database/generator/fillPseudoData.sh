#!/bin/bash

fich=$1
nbreCarac=$2
separator=$3
cat $fich|while read line; do
  echo "${line},$(./randPseudoGenerator.sh $nbreCarac $separator)"
done > fileArtiste.csv
