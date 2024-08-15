```
# prefix
set -g prefix C-j
unbind C-b

# window
set -g base-index 1
setw -g pane-base-index 1
set-option -g renumber-windows on

# key bind
bind -r h select-pane -L
bind -r j select-pane -D
bind -r k select-pane -U
bind -r l select-pane -R

# coloer
set-option -g status-bg "color255"
```

