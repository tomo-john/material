### shutdown
シャットダウン・再起動など

通常はrootユーザーでしか実行できない

```
-r : 再起動(reboot)
-h : 終了して停止(halt)
-c : 実行中のシャットダウンのキャンセル(cancel)
now: 今すぐに

# 今すぐにシステムを停止(シャットダウン)
shutdown -h now
```

---

### 時刻指定
```
# 23:30にシステムを再起動
shutdown -r 23:30

# 10分後にシステムを停止
shutdown -h +10
```

