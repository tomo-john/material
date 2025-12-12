# Spacing

## paddingとmargin

- `p` = `padding` : 要素の内側の余白(コンテンツとボーダーの間)
- `m` = `margin` : 要素の外側の余白(ボーダーの外側と他の要素の間)
- Tailwindの`1`は、`0.25rem` = `4px`
- Tailwindの`4`は、`1rem` = `16px`
- `y`はVertical(縦) = 上下に指定
- `x`はHorizontal(縦) = 左右に指定
- `t`は`top` = 上
- `r`は`right` = 右
- `l`は`left` = 左
- `b`は`bottom` = 下

### 例

| クラス | CSS相当                     |
|--------|-----------------------------|
| `p-4`  | `padding: 1rem;`            |
| `py-4` | `padding-top/bottom: 1rem;` |
| `px-4` | `padding-left/right: 1rem;` |
| `m-8`  | `margin: 2rem;`             |
| `mt-8` | `margin-top: 2rem`          |
| `mr-8` | `margin-right: 2rem`        |
| `mb-8` | `margin-bottom: 2rem`       |
| `ml-8` | `margin-left: 2rem`         |

## space

子要素間の間隔指定に使用する。指定するのは親要素に対して行う。

横方向の場合は`space-x-*`、縦方向の場合は`space-y-x`で指定。

### 仕組み

`space-y-4`を親要素に指定すると、全ての子要素に対して`margin-top:1rem`が適応される。

=> 子要素の全てに適用される = 最初の要素や最後の要素にも適用されるので注意

=> `flex`の`gap`の場合は、子要素と子要素の間にだけ間隔が適用される

