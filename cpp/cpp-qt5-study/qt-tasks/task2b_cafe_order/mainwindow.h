#ifndef MAINWINDOW_H
#define MAINWINDOW_H

#include <QMainWindow>
#include <QMap>
#include <QString>

class CafeOrder;
class QPushButton;
class QLCDNumber;

QT_BEGIN_NAMESPACE
namespace Ui {
class MainWindow;
}
QT_END_NAMESPACE

class MainWindow : public QMainWindow
{
    Q_OBJECT

public:
    explicit MainWindow(QWidget *parent = nullptr);
    ~MainWindow() override;

private slots:
    void onDrinkClicked();

private:
    Ui::MainWindow *ui;
    CafeOrder *m_cafeOrder;
    QMap<QString, QPushButton *> m_drinkButtons;      // ドリンクとボタンの対応表
    QMap<QString, QLCDNumber *> m_drinkStockDisplays; // ドリンクと在庫LCD表示の対応表

    void initViews();                                 // 画面の初期表示を形成する
};
#endif // MAINWINDOW_H
