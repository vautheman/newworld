#include "produit.h"
#include <QDebug>

///
/// \brief Produit::Produit
/// Déclaration du constructeur vide
Produit::Produit()
{

}

///
/// \brief Produit::Produit
/// \param libelle
/// \param description
/// \param image
/// \param prixUnitaire
/// \param quantite
/// Constructeur de la classe Produit qui permet l'ajout des paramètres de ses derniers.
Produit::Produit(QString libelle, QString description, QString image, double prixUnitaire, int quantite)
{
    this->produitLib = libelle;
    this->produitDesc = description;
    this->produitImage = image;
    this->produitPU = prixUnitaire;
    this->produitQuantite = quantite;

    qDebug()<<produitDesc;
}

QString Produit::versChaineProduit()
{
    QString chaine;
    QString prix = QString::number(produitPU);
    QString quantite = QString::number(produitQuantite);
    chaine += "<img src='" + produitImage + "'></img>";
    chaine += "<h3>" + produitLib + "</h3>";
    chaine += "<p>" + produitDesc + "</p>";
    chaine += "<h4>" + prix + " €</h4>";
    chaine += "<h4>Plus que : " + quantite + " produit disponible</h4>";
}

