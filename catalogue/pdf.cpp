#include <QPrinter>
#include <QTextDocument>
#include <QDebug>

#include "pdf.h"
#include "passerelle.h"

Pdf::Pdf()
{

}

Pdf::Pdf(QString nomDocument)
{
    this->Titre = nomDocument;
    leTexte="<html>"
                "<head>"
                "</head>"
                    "<body>"
                        "<main>"
                            "<header>"
                                "<h1>Your catalogue New World </h1>"
                            "</header>"
                        "</main>";
}

void Pdf::ecrireTexte(QString theTexte)
{   
    qDebug()<<"void Pdf::ecrireTexte(QString theTexte)";
    leTexte += theTexte;
    leTexte+="</body></html>";
}

void Pdf::imprimer()
{
    qDebug()<<"void Pdf::imprimer()";
    QPrinter printer(QPrinter::PrinterResolution);
    printer.setOutputFormat(QPrinter::PdfFormat);
    printer.setOutputFileName(Titre);
    printer.setPageSize(QPrinter::A4);

    QTextDocument monDoc;
    monDoc.setHtml(leTexte);
    qDebug()<<leTexte;
    monDoc.print(&printer);
}

