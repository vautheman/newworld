#ifndef MAINWINDOW_H
#define MAINWINDOW_H

#include <QMainWindow>
#include <QtNetwork/QtNetwork>

namespace Ui {
class MainWindow;
}

class MainWindow : public QMainWindow
{
    Q_OBJECT

public:
    explicit MainWindow(QNetworkAccessManager *pmyMWM, QString theName, QString theSurname, QString theIdentifiant, QWidget *parent = nullptr);
    ~MainWindow();

private:
    Ui::MainWindow *ui;
    QString name;
    QString surname;
    QString id;
    QNetworkReply *reply;
    QJsonArray jsArray;
    QNetworkAccessManager *myNWM;
};

#endif // MAINWINDOW_H
