#!/bin/bash
#  Generate a random pseudo with X letters, using the different ASCII caracters (between the 33th and the 126th)
#  @author Trilunaire

letters=10
for (( i = 0; i < $letters; i++ ))
  do
    #we generate a first random number between 33 and 126:
    rand=$[$RANDOM % ($[126-33]+1) + 33]
    #now we just have to traduct our number in hexadecimal
    hexa=$(printf %x $rand)
    #and hexa to char and concatenate the string:
    pseudo=$pseudo$(printf "\x$hexa")
  done
echo $pseudo
