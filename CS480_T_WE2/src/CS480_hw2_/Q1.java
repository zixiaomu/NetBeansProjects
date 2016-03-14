/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package CS480_hw2_;
/**
 *
 * @author yugengchang
 */
public class Q1 
{

    public static class Circle 
    {
        static final double PI=3.1415926;

        private int  radius;

        Circle()
        {
          radius = 1;
        }
        Circle(int radius)
        {
            this.radius = radius;
        }
        public int getRadius() {
            return radius;
        }

        public void setRadius(int radius) {
            this.radius = radius;
        }
    
        public double getArea()
        {
            return Math.pow(PI*radius,2);
        }
    
        public double getPerimeter()
        {
            return 2*PI*radius;
        }
    }
    
    public static class  TestCircle
    {
        Circle  circle_1= new Circle();
        Circle  circle_2= new Circle(5);
        TestCircle()
        {
           
        }
        public void displayCircle_1()
        {
            System.out.println("Radius:"+circle_1.getRadius()+"Area:"+circle_1.getArea()+"Perimeter:"+circle_1.getPerimeter());
        }
        public  void displayCircle_2()
        {
            System.out.println("Radius:"+circle_2.getRadius()+"Area:"+circle_2.getArea()+"Perimeter:"+circle_2.getPerimeter());
        }
    }
    

    
    /**
     * @param args the command line arguments
     */
   
    
    public static void main(String[] args) 
    {
        
       TestCircle cir = new TestCircle();
        cir.displayCircle_1();
        cir.displayCircle_2();
    }
    
}



  


