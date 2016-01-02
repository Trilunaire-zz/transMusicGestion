#!/bin/bash

fich=$1
cat $fich|while read line; do
  echo "$(./randPseudoGenerator.sh),${line}"
done > fileArtiste.csv
