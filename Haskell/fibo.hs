fibonacci :: Integer -> Integer
fibonacci n = fibHelper n 0 1
  where
    fibHelper 0 a _ = a
    fibHelper n a b = fibHelper (n - 1) b (a + b)
