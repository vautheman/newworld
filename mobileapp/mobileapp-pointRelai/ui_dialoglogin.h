/********************************************************************************
** Form generated from reading UI file 'dialoglogin.ui'
**
** Created by: Qt User Interface Compiler version 5.7.1
**
** WARNING! All changes made in this file will be lost when recompiling UI file!
********************************************************************************/

#ifndef UI_DIALOGLOGIN_H
#define UI_DIALOGLOGIN_H

#include <QtCore/QVariant>
#include <QtWidgets/QAction>
#include <QtWidgets/QApplication>
#include <QtWidgets/QButtonGroup>
#include <QtWidgets/QDialog>
#include <QtWidgets/QHeaderView>
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
            DialogLogin->setObjectName(QStringLiteral("DialogLogin"));
        DialogLogin->resize(393, 663);
        pushButton_connect = new QPushButton(DialogLogin);
        pushButton_connect->setObjectName(QStringLiteral("pushButton_connect"));
        pushButton_connect->setGeometry(QRect(60, 340, 261, 31));
        lineEdit_user = new QLineEdit(DialogLogin);
        lineEdit_user->setObjectName(QStringLiteral("lineEdit_user"));
        lineEdit_user->setGeometry(QRect(60, 260, 261, 27));
        lineEdit_pwd = new QLineEdit(DialogLogin);
        lineEdit_pwd->setObjectName(QStringLiteral("lineEdit_pwd"));
        lineEdit_pwd->setGeometry(QRect(60, 300, 261, 27));
        lineEdit_pwd->setEchoMode(QLineEdit::Password);

        retranslateUi(DialogLogin);

        QMetaObject::connectSlotsByName(DialogLogin);
    } // setupUi

    void retranslateUi(QDialog *DialogLogin)
    {
        DialogLogin->setWindowTitle(QApplication::translate("DialogLogin", "Dialog", Q_NULLPTR));
        pushButton_connect->setText(QApplication::translate("DialogLogin", "connection", Q_NULLPTR));
        lineEdit_user->setPlaceholderText(QApplication::translate("DialogLogin", "user", Q_NULLPTR));
        lineEdit_pwd->setPlaceholderText(QApplication::translate("DialogLogin", "password", Q_NULLPTR));
    } // retranslateUi

};

namespace Ui {
    class DialogLogin: public Ui_DialogLogin {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_DIALOGLOGIN_H
