#include "backoffice.h"
#include "dialogconnexion.h"
#include <QApplication>

int main(int argc, char *argv[])
{
    QApplication a(argc, argv);
    DialogConnexion connexion;
    Backoffice w;
    connexion.show();

    return a.exec();
}
