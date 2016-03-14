/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package quiz1;
import java.util.Random;

/**
 *
 * @author yugengchang
 */
public class Quiz1 {

    /**
     * @param args the command line arguments
     */
    public static int  checkCreditCardNumber(int[] ccNumber,int size)
    {
        int [] reverse_ccNumber;
        int checksum=0;
        reverse_ccNumber = new int[size];
        for (int i =0;i<size;i++)
        {
            reverse_ccNumber[i]=ccNumber[size-i-1];
        }
        for (int i =0 ;i<size ;i++)
        {
            if ((i+1)%2 !=0)
            {
                if (reverse_ccNumber[i]*2 >9)
                {
                    checksum+=1;
                }
                else
                {
                    checksum+= reverse_ccNumber[i]*2;
                }
            }  
             
        }
        
        if (checksum%10 == 0)
            return 1;
        return 0;
    }
    public static void main(String[] args) {
        // TODO code application logic here
        int[] ccNumber;
        int n;
        ccNumber= new int [20];
        int [] reverse_ccNumber;
        reverse_ccNumber = new int[20];
        Random random_Number = new Random();
        for (int i =0;i<20;i++)
        {
           ccNumber[i] = random_Number.nextInt(9);
        }
        
        for (int i =0;i<20;i++)
        {
            reverse_ccNumber[i]=ccNumber[20-i-1];
        }
        n=checkCreditCardNumber(ccNumber,20);
        
        if (n==1)
            System.out.println("true");
        else 
            System.out.println("false");

    }
       
    
    
}
