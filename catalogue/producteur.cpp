#include "producteur.h"
#include "produit.h"
#include <QDebug>

Producteur::Producteur()
{

}

Producteur::Producteur(QString sonNomDeSociete, QString sonAdresse)
{
    this->producteurNomSociete = sonNomDeSociete;
    this->producteurAdresse = sonAdresse;

    qDebug()<<" " + producteurNomSociete + ", " + producteurAdresse;
}

QString Producteur::versChaineProducteurs()
{
    QString chaine;

    chaine += "<p><b>" + producteurNomSociete + "</b> : " + producteurAdresse + "</p><br>";
    Produit monProduit;
    qDebug()<<"La taille des produits est : "<<lesProduits.size();
    chaine +="<table>";
    for(int noProduit=0;noProduit<lesProduits.size();noProduit++)
    {
        chaine+=lesProduits[noProduit].versChaineProduit();
    }
    chaine += "</table>";
    return chaine;
}

void Producteur::setProduits(QVector<Produit> sesProduits)
{
    this->lesProduits = sesProduits;
}

