-- Напиши SQL-запросы
-- Имеем следующую таблицу со списком сотрудников
-- Id Name LastName DepartamentId Salary
-- 1 Иван Смирнов 2 100000
-- 2 Максим Петров 2 90000
-- 3 Роман Иванов 3 95000
-- 
-- 1. Написать запрос для вывода самой большой зарплаты в каждом департаменте
-- 2. Написать запрос для вывода списка сотрудников из 3-го департамента у которых ЗП больше 90000
-- 3. Написать запрос по созданию индексов для ускорения


CREATE TABLE staff (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    last_name VARCHAR(100),
    departament_id INT,
    salary INT,
    INDEX index_departament_id (departament_id),
    INDEX index_salary (salary)
);


INSERT INTO staff (name, last_name, departament_id, salary) VALUES
('Иван', 'Смирнов', 2, 100000),
('Максим', 'Петров', 2, 90000),
('Роман', 'Иванов', 3, 95000);


SELECT departament_id as 'Департамент', MAX(salary) as 'Максимальная зарплата'
FROM staff
GROUP BY departament_id;


SELECT *
FROM staff
WHERE departament_id = 3 and salary > 90000;





