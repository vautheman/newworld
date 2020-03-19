#include "mainwindow.h"
#include "dialoglogin.h"
#include <QApplication>
#include <QtSql>

int main(int argc, char *argv[])
{
    QApplication a(argc, argv);
    DialogLogin dialogLogin;

    // On met l'application en plein écran
    //dialogLogin.setWindowState(dialogLogin.windowState()|Qt::WindowFullScreen);

    if(dialogLogin.exec()==QDialog::Accepted)
    {
        MainWindow w(&dialogLogin.myNWM, dialogLogin.nom, dialogLogin.prenom, dialogLogin.identifiant);
        w.show();
        return a.exec();
    } else {
        return(-1);
    }
}
