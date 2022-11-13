DROP DATABASE IF EXISTS sklep;
CREATE DATABASE sklep;

USE sklep;

CREATE TABLE kategoria (
    kategoria_id int(11) NOT NULL AUTO_INCREMENT,
    nazwa varchar(50) NOT NULL,
    PRIMARY KEY (kategoria_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE produkty (
    produkt_id int(11) NOT NULL AUTO_INCREMENT,
    nazwa varchar(50) NOT NULL,
    format varchar(10) NOT NULL,
    rozdzielczosc varchar(50) NOT NULL,
    kategoria int(11) NOT NULL,
    zdjecie varchar(255) NOT NULL,
    PRIMARY KEY (produkt_id),
    FOREIGN KEY (kategoria) REFERENCES kategoria(kategoria_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE uprawnienia (
    uprawnienia_id int(11) NOT NULL AUTO_INCREMENT,
    nazwa varchar(50) NOT NULL,
    PRIMARY KEY (uprawnienia_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE uzytkownicy (
    uzytkownik_id int(11) NOT NULL AUTO_INCREMENT,
    imie varchar(50) NOT NULL,
    nazwisko varchar(50) NOT NULL,
    email varchar(50) NOT NULL,
    haslo varchar(100) NOT NULL,
    uprawnienia int(11) NOT NULL,
    PRIMARY KEY (uzytkownik_id),
    UNIQUE (email),
    FOREIGN KEY (uprawnienia) REFERENCES uprawnienia(uprawnienia_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE zamowienia (
    zamowienie_id int(11) NOT NULL AUTO_INCREMENT,
    uzytkownik int(11) NOT NULL,
    data date NOT NULL,
    PRIMARY KEY (zamowienie_id),
    FOREIGN KEY (uzytkownik) REFERENCES uzytkownicy(uzytkownik_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE sprzedarz (
    zamowienie_id int(11) NOT NULL,
    produkt_id int(11) NOT NULL,
    PRIMARY KEY (zamowienie_id,produkt_id),
    FOREIGN KEY (produkt_id) REFERENCES produkty(produkt_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
