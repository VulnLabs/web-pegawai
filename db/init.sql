CREATE TABLE IF NOT EXISTS pegawai (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    jabatan VARCHAR(100),
    username VARCHAR(100),
    password VARCHAR(100)
);

INSERT INTO pegawai (nama, jabatan, username, password) VALUES
('John', 'SysAdmin', 'john', MD5('john123')),
('Andi', 'Manager', 'andi', MD5('andi123')),
('Sari', 'HRD', 'sari', MD5('sarikeren2025^^^')),
('Budi', 'Network Engineer', 'budi', MD5('budi1xxdaw23')),
('Lisa', 'Developer', 'lisa', MD5('lisa456')),
('Rina', 'Intern', 'rina', MD5('rina789')),
('Yusuf', 'Finance', 'yusuf', MD5('uang2010')),
('Dewi', 'Legal', 'dewi', MD5('hukum321'));
