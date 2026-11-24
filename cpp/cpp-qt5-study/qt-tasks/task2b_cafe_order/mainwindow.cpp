#include "mainwindow.h"
#include "ui_mainwindow.h"
#include "cafeorder.h"
#include <QString>
#include <QLCDNumber>

MainWindow::MainWindow(QWidget *parent)
    : QMainWindow(parent)
    , ui(new Ui::MainWindow)
    , m_cafeOrder(new CafeOrder(this))
{
    ui->setupUi(this);

    m_drinkButtons = {
        {"Coffee", ui->coffeeButton},
        {"Tea", ui->teaButton},
        {"Juice", ui->juiceButton},
        {"Water", ui->waterButton},
    };

    m_drinkStockDisplays = {
        {"Coffee", ui->coffeeStockDisplay},
        {"Tea", ui->teaStockDisplay},
        {"Juice", ui->juiceStockDisplay},
        {"Water", ui->waterStockDisplay},
    };

    // ドリンクのボタン
    for(auto it = m_drinkButtons.begin(); it != m_drinkButtons.end(); ++it) {
        connect(it.value(), &QPushButton::clicked, this, &MainWindow::onDrinkClicked);
    }

    // クリアーボタン
    connect(ui->clearButton, &QPushButton::clicked, m_cafeOrder, &CafeOrder::clear);

    // 在庫更新時
    connect(m_cafeOrder, &CafeOrder::stockChanged, this, [this](const QString &drink, int newStock) {
        m_drinkStockDisplays[drink]->display(newStock);
    });

    // 予算更新時(今回はここでボタン押せるか判定)
    connect(m_cafeOrder, &CafeOrder::budgetChanged, this, [this](int newBudget) {
        ui->budgetDisplay->display(newBudget);

        // 各ドリンクがオーダーできるか(ボタンが押せるか)の確認
        for (auto it = m_drinkButtons.begin(); it != m_drinkButtons.end(); ++it) {
            it.value()->setEnabled(m_cafeOrder->canOrder(it.key()));
        }
    });

    // 合計更新時
    connect(m_cafeOrder, &CafeOrder::totalChanged, this, [this](int newTotal) {
        ui->totalDisplay->display(newTotal);
    });

    // 画面初期化処理(connectの後ろに書かないと発火しなかった)
    initViews();
}

MainWindow::~MainWindow()
{
    delete ui;
}

void MainWindow::initViews()
{
    for(auto it = m_drinkButtons.begin(); it != m_drinkButtons.end(); ++it) {
        int price = m_cafeOrder->price(it.key());

        it.value()->setText(QString("%1 %2").arg(it.key()).arg(price));
    }

    m_cafeOrder->clear();
}

void MainWindow::onDrinkClicked()
{
    QPushButton *button = qobject_cast<QPushButton *>(sender());

    if (button == nullptr) {
        return;
    }

    const QString drink = m_drinkButtons.key(button);

    m_cafeOrder->order(drink);
}