#ifndef PRODUIT_H
#define PRODUIT_H

#include <QString>

///
/// \brief The Produit class
/// La classe Produit permet de récupérer toutes les informations des ses derniers et de les stockers dans des paramètres
class Produit
{
private:
    // Propriétés des produits
    // Libellé du produit
    QString produitLib;
    // Description du produit
    QString produitDesc;
    // Image du produit
    QString produitImage;
    // Prix unitaire du produit
    double produitPU;
    // Quantite de produit restant
    int produitQuantite;


public:
    Produit();
    // Constructeur qui récupère les produits des producteurs
    Produit(QString libelle, QString description, QString image, double prixUnitaire, int quantite);

    QString versChaineProduit();

    QString getProduitLib() const;
};

#endif // PRODUIT_H
