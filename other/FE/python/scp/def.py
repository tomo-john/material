def calculate_human_age(dog_age):
  human_age = 0
  
  if dog_age < 7:
    human_age = dog_age * 5
  else:
    human_age = dog_age * 4

  return human_age

human_age_9 = calculate_human_age(9)
human_age_5 = calculate_human_age(5)

print(f"9歳の犬は人間だと{human_age_9}歳です。")
print(f"5歳の犬は人間だと{human_age_5}歳です。")

