#include "typeproduit.h"

TypeProduit::TypeProduit()
{

}

TypeProduit::TypeProduit(QString libelleProduit, QString nomEnt, QString activite, QString adresse, QString pays, QString ville, QString cp, QString libelle, QString description, QString image) : Rayon(nomEnt, activite, adresse, pays, ville)
{
    libelle = TypeProduitLib;
}
