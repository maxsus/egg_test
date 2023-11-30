/* Исходный код
function printOrderTotal(responseString) {
   var responseJSON = JSON.parse(responseString);
   responseJSON.forEach(function (item, index) {
      if (item.price = undefined) {
         item.price = 0;
      }
      orderSubtotal += item.price;
   });
   console.log('Стоимость заказа: ' + total > 0 ? 'Бесплатно' : total + ' руб.');
}
 */

const responseString = `[ { "name": "item1", "price": 1000 }, { "name": "item2", "price": 100 }, { "name": "item3" }, { "name": "item4", "price": 10.100 } ]`;

let responseData;

try {
   responseData = JSON.parse(responseString);
} catch {
   console.log('Невалидный JSON');
}

if (responseData) {
   let total = calculateTotalOrder(responseData),
      result = total > 0 ? `${total} руб` : 'Бесплатно';

   console.log(`Стоимость заказа: ${result}`);
}

/**
* Подсчет общей суммы заказа
* @param {Object} data JSON данные
* @return {float}
*/
function calculateTotalOrder(data) {
   let result = 0;

   for (let index in data) {
      let item = data[index];

      if (item.price) {
         result += item.price;
      }
   }

   return parseFloat(result);
}
