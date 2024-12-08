
#include <iostream> 
using namespace std;

int main() {
    int hectareas = 10000, numHectareas = 0, superficie = 0;

    cout << "Cuantas hectáreas desea reforestar?" << endl;
    cin >> numHectareas;

    superficie = hectareas * numHectareas;

    if (superficie > 1000000) {
        /* Los pinos ocupan el 70% de la superficie total */
        cout << "Tenemos que sembrar " << (superficie * 70) / 100 << " metros de pino" << endl; 

        /* Los pardillos ocupan el 20% de la superficie total */
        cout << "Tenemos que sembrar " << (superficie * 20) / 100 << " metros de pardillo" << endl; 
        
        /* Los cedros ocupan el 10% de la superficie total */
        cout << "Tenemos que sembrar " << (superficie * 10) / 100 << " metros de cedro" << endl; 

        /* Según el enunciado, tenemos que en 15 metros de pardillo tenemos 15 pardillos, por lo que tenemos un pardillo por metro */
        cout << (superficie * 20) / 100 << " Arboles de pardillo" << endl; 
        
        /* Según el enunciado, tenemos que en 10 metros tenemos 8 pinos, eso equivale a que los pinos ocupan el 80% de su espacio, ya que el 80% de 10 es 8 */
        cout << (((superficie * 70) / 100) * 80) / 100 << " Arboles de pino" << endl; 
        
        /* Según el enunciado, tenemos que en 17 metros tenemos 10 cedros, por lo que eso es el 60% de el espacio de los cedros, ya que 10 es el 60% de 17 */
        cout << (((superficie * 10) / 100) * 60) / 100 << " Arboles de cedro" << endl; 
    } else if (superficie <= 1000000) {
        /* Los pinos ocupan el 50% de la superficie total */
        cout << "Tenemos que sembrar " << (superficie * 50) / 100 << " metros de pino" << endl;

        /* Los pardillos ocupan el 30% de la superficie total */
        cout << "Tenemos que sembrar " << (superficie * 30) / 100 << " metros de pardillo" << endl; 
        /* Los cedros ocupan el 20% de la superficie total */
        
        cout << "Tenemos que sembrar " << (superficie * 20) / 100 << " metros de cedro" << endl;

        /* Escribimos en pantalla un título para indicarle al usuario lo que va a ver */
        cout << "Los arboles que posee el bosque ahora son:" << endl;

        /* Según el enunciado, tenemos que en 15 metros de pardillo tenemos 15 pardillos, por lo que tenemos un pardillo por metro */
        cout << (superficie * 30) / 100 << " Arboles de pardillo" << endl; 

        /* Según el enunciado, tenemos que en 10 metros tenemos 8 pinos, eso equivale a que los pinos ocupan el 80% de su espacio, ya que el 80% de 10 es 8 */
        cout << (((superficie * 50) / 100) * 80) / 100 << " Arboles de pino" << endl; 

        /* Según el enunciado, tenemos que en 17 metros tenemos 10 cedros, por lo que eso es el 60% de el espacio de los cedros, ya que 10 es el 60% de 17 */
        cout << (((superficie * 20) / 100) * 60) / 100 << " Arboles de cedro" << endl; 
    }

    return 0;
}