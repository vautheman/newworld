#include "rayon.h"
#include "producteur.h"

Rayon::Rayon()
{

}

Rayon::Rayon(QString nomEnt, QString activite, QString adresse, QString pays, QString ville, QString cp, QString libelle, QString description, QString image) : Producteur(nomEnt, activite, adresse, pays, ville, cp)
{
    libelle = rayonLib;
    description = rayonDesc;
    image = rayonImg;
}

