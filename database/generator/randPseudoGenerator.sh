#!/bin/bash
#  Generate a random pseudo with X letters, using the different ASCII caracters (between the 48th and the 126th)
#  @author Trilunaire
# if you want to add a separator, uncomment the lines 13 to 18
separateurCSV=$2
numberLettre=$1
for (( i = 0; i < $numberLettre; i++ ))
  do
    #we generate a first random number between 33 and 126:
    rand=$[$RANDOM % ($[126-48]+1) + 48]
    #now we just have to traduct our number in hexadecimal
    hexa=$(printf %x $rand)
    #and hexa to char and concatenate the string:
    # if [ "$(printf "\x$hexa")" == $separateurCSV ]; then
    # let i--
    # else
    pseudo=$pseudo$(printf "\x$hexa")
    # fi
  done
echo $pseudo
