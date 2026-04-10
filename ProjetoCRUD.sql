

CREATE TABLE alunos (
    id SERIAL PRIMARY KEY,
    matricula VARCHAR(10) UNIQUE NOT NULL,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    data_nascimento DATE,
    curso VARCHAR(100) NOT NULL,
    situacao VARCHAR(20) NOT NULL DEFAULT 'Ativo',
    observacoes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 4. Inserir dados de teste (opcional)
INSERT INTO alunos (matricula, nome, email, curso, situacao) VALUES
('2024001', 'Joao Silva', 'joao@email.com', 'Analise e Desenvolvimento de Sistemas', 'Ativo'),
('2024002', 'Maria Oliveira', 'maria@email.com', 'Ciencia da Computacao', 'Ativo'),
('2023015', 'Pedro Almeida', 'pedro@email.com', 'Engenharia de Software', 'Trancado');