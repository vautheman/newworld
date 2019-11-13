#include "produit.h"

Produit::Produit()
{

}

Produit::Produit(QString libelle, QString description, QString image, double prixUnitaire, int quantite)
{
    libelle = produitLib;
    description = produitDesc;
    image = produitImage;
    prixUnitaire = produitPU;
    quantite = produitQuantite;
}
