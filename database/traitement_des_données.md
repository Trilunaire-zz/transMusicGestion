# Pré-traitement des données
* Récupération des données sous forme de fichier csv
* Conversion de l'encodage de ISO à UTF-8 (pour conserver les accents)

## Pour les artistes:
* Pour les artistes, toutes les informations le concernants sont conservées et mises dans un fichier csv avec UNIX (concervation des colonnes contenants les informations des artistes, suppression de l'en-tête et tri par ordre alphabétique):

```
cut -d';' -f3,25-28,29-32,33,34 Open_data_Artistes_Rencontres_Trans_Musicales_1979_2014.csv | tail -n +2 | sort > artistes.csv

```
* Sont concervés pour les artistes uniquement le nom, le premier pays et la première ville d'origine.
* Un générateur de pseudonymes aléatoire est crée avec l'aide de bash.
* Une fois le fichier contenant tous les artistes crée, nous nous sommes rendu compte que des artistes étaient présents en double. Pour déterminer les doublons a supprimer, nous avons une fois encore utilisé les commandes UNIX:

```
cut -d',' -f 2 fileArtiste.csv | uniq -c | sort -n

```
## Pour les salles et les bars:
* Concernant les salles, plusieurs commande permettent de mettre petit à petit toutes les salles du fichier:

```
cut -d';' -f7-8 Open_data_Artistes_Rencontres_Trans_Musicales_1979_2014.csv | tail -n +2 > salles.csv
cut -d';' -f11-12 Open_data_Artistes_Rencontres_Trans_Musicales_1979_2014.csv | tail -n +2 >> salles.csv
cut -d';' -f15-16 Open_data_Artistes_Rencontres_Trans_Musicales_1979_2014.csv | tail -n +2 >> salles.csv
cut -d';' -f19-20 Open_data_Artistes_Rencontres_Trans_Musicales_1979_2014.csv | tail -n +2 >> salles.csv
cut -d';' -f23-24 Open_data_Artistes_Rencontres_Trans_Musicales_1979_2014.csv | tail -n +2 >> salles.csv
sort salles.csv | uniq > salle.csv
mv salle.csv salles.csv
```
