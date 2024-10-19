-- CREATE
CREATE TABLE test (
  id SERIAL PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  power INTEGER,
  created_at TIMESTAMP(0) DEFAULT CURRENT_TIMESTAMP
);

-- INSERT
INSERT INTO test (name, power) VALUES
  ('jim', 10),
  ('john', 2),
  ('pyonkichi', 8),
  ('mocomoca', 6);

