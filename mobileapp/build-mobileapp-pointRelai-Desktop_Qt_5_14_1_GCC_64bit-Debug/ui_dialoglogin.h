/********************************************************************************
** Form generated from reading UI file 'dialoglogin.ui'
**
** Created by: Qt User Interface Compiler version 5.14.1
**
** WARNING! All changes made in this file will be lost when recompiling UI file!
********************************************************************************/

#ifndef UI_DIALOGLOGIN_H
#define UI_DIALOGLOGIN_H

#include <QtCore/QVariant>
#include <QtWidgets/QApplication>
#include <QtWidgets/QDialog>
#include <QtWidgets/QLineEdit>
#include <QtWidgets/QPushButton>

QT_BEGIN_NAMESPACE

class Ui_DialogLogin
{
public:
    QPushButton *pushButton_connect;
    QLineEdit *lineEdit_user;
    QLineEdit *lineEdit_pwd;

    void setupUi(QDialog *DialogLogin)
    {
        if (DialogLogin->objectName().isEmpty())
            DialogLogin->setObjectName(QString::fromUtf8("DialogLogin"));
        DialogLogin->resize(393, 663);
        pushButton_connect = new QPushButton(DialogLogin);
        pushButton_connect->setObjectName(QString::fromUtf8("pushButton_connect"));
        pushButton_connect->setGeometry(QRect(60, 340, 261, 31));
        lineEdit_user = new QLineEdit(DialogLogin);
        lineEdit_user->setObjectName(QString::fromUtf8("lineEdit_user"));
        lineEdit_user->setGeometry(QRect(60, 260, 261, 27));
        lineEdit_pwd = new QLineEdit(DialogLogin);
        lineEdit_pwd->setObjectName(QString::fromUtf8("lineEdit_pwd"));
        lineEdit_pwd->setGeometry(QRect(60, 300, 261, 27));
        lineEdit_pwd->setEchoMode(QLineEdit::Password);

        retranslateUi(DialogLogin);

        QMetaObject::connectSlotsByName(DialogLogin);
    } // setupUi

    void retranslateUi(QDialog *DialogLogin)
    {
        DialogLogin->setWindowTitle(QCoreApplication::translate("DialogLogin", "Dialog", nullptr));
        pushButton_connect->setText(QCoreApplication::translate("DialogLogin", "connection", nullptr));
        lineEdit_user->setPlaceholderText(QCoreApplication::translate("DialogLogin", "user", nullptr));
        lineEdit_pwd->setPlaceholderText(QCoreApplication::translate("DialogLogin", "password", nullptr));
    } // retranslateUi

};

namespace Ui {
    class DialogLogin: public Ui_DialogLogin {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_DIALOGLOGIN_H
