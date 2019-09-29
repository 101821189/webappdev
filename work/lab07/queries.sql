-- create the table
CREATE TABLE newcars (
    car_id INT AUTO_INCREMENT PRIMARY KEY,
    make VARCHAR(255),
    model VARCHAR(255),
    price INT,
    yom INT
);

-- insert values into the table
INSERT INTO newcars (
    make,
    model,
    price,
    yom
) VALUES (
    "Holden",
    "Astra",
    14000,
    2005
);

-- see all entries
SELECT * FROM newcars;

-- select all entries, sort by make and model
SELECT make, model, price FROM newcars ORDER BY make, model;

-- select makes and models that are >= $20,000
SELECT make, model FROM newcars WHERE price >= 20000;

-- select makes and models that are <= $15,000
SELECT make, model FROM newcars WHERE price <= 15000;

-- select average price for all makes
SELECT make, AVG(price) FROM newcars GROUP BY make;