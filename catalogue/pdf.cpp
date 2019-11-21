#include <QtPrintSupport/QPrinter>

#include "pdf.h"
#include "passerelle.h"

Pdf::Pdf()
{

}

Pdf::Pdf(QString nomDocument)
{
    this->Titre = nomDocument + ".pdf";
}

void Pdf::ecrireTexte()
{
    Produit mesProduits;
    mesProduits.versChaineProduit();
}

