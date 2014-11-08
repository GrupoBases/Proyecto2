public class Funcion_backtracking {

    public static void main(String[] args){

        int[] posicionBote={0}; //cero es bote izquierda y 1 es bote a la derecha
        int[] isla1={3,2};//cantidad de canivales y misioneros iniciales
        int[] isla2={0,0};//cantidad de canivales y misioneros iniciales
        int[][] islaActual={isla1, isla2, posicionBote};
        int[][]estadoViaje = {{1,0}, {0, 1}, {1, 1}, {2, 0}, {0, 2}}; //posibilidades de estados

       Funcion_backtracking(islaActual, estadoViaje, null);
    }

    public  static boolean Funcion_accept(int[][] islaActual){ // funcion de aceptacion
        if(islaActual[0][0]==0 && islaActual[0][1]==0) {
            return true;
        
        }else{
            return false;
        }

    }

    public  static boolean Funcion_reject(int[][] islaActual){ // funcion de rechazo

        if(islaActual[0][0]<0 || islaActual[0][1]<0 || islaActual[1][0]<0 || islaActual[1][1]<0 || (islaActual[0][0]<islaActual[0][1] && 
            islaActual[0][0]>0) ||  (islaActual[1][0]<islaActual[1][1] && islaActual[1][0]>0 ) ) { //si hay 2 o mas canivales que misioneros
            return true;
        
        }else{
            return false;
        }
    }

    private static void Funcion_backtracking(int[][] islaActual, int[][] estadoViaje, int[] viajeAnterior) { //funcion del backtraking
        int arbolRecursivo=0;

        imprimirEstado(islaActual, arbolRecursivo);// 

        if (Funcion_reject(islaActual)){
            System.out.println("Funcion_reject");
            return;
        } if (Funcion_accept(islaActual)) {
            System.out.println("Funcion_accept");
            return ;
        }

        System.out.println("no Funcion_rejected, no Funcion_accepted!");

        int count=0;
        while (cont<5) {
        islaActual = inicarViaje(estadoViaje[cont], islaActual);
        Funcion_backtracking(islaActual,estadoViaje,estadoViaje[cont]);
        }
        
        arbolRecursivo++;
    }


    public static int[][] inicarViaje(int[] viaje, int[][]islaActual) {
        islaActual[islaActual[2][0]][0] -= viaje[0];
        islaActual[islaActual[2][0]][1] -= viaje[1];

        if (islaActual[2][0] == 0) {
            islaActual[2][0] = 1;
        }
        else{
            islaActual[2][0] = 0;
        }

        islaActual[islaActual[2][0]][0] += viaje[0];
        islaActual[islaActual[2][0]][1] += viaje[1];
        return islaActual;
    }


    public static void imprimirEstado(int[][] islaActual, int profundidad){
        while(profundidad!=0){
            System.out.print(">");
            profundidad--;
        }

        System.out.println("(misioneros:"+islaActual[0][0] + ", canibales:"+islaActual[0][1] + ", 
            bote:"+islaActual[2][0]+")  (misioneros:"+islaActual[1][0] + ", canibales:"+islaActual[1][1] + ", 
            bote:"+islaActual[2][0]+")");

    }
}