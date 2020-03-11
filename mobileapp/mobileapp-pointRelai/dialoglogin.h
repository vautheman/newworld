#ifndef DIALOGLOGIN_H
#define DIALOGLOGIN_H

#include <QDialog>
#include <QtNetwork/QtNetwork>

namespace Ui {
class DialogLogin;
}

class DialogLogin : public QDialog
{
    Q_OBJECT

public:
    explicit DialogLogin(QWidget *parent = nullptr);
    ~DialogLogin();
    QString identifiant;
    QString nom;
    QString prenom;
    QNetworkAccessManager myNWM;
    QNetworkCookieJar cookieJar;

private slots:
    void on_pushButton_connect_clicked();

private:
    Ui::DialogLogin *ui;
};

#endif // DIALOGLOGIN_H
