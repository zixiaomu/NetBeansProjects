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
public class Q2 
{
    public static class Address
    {
        private String city;
        private String state;
        private String county;
        Address()
        {
            city="Fremont";
            state="CA";
            county="US";
        }
        Address(String city ,String state,String county)
        {
            this.city=city;
            this.county=county;
            this.state=state;
            
        }
        public String getCity() {
            return city;
        }

        public void setCity(String city) {
            this.city = city;
        }

        public String getState() {
            return state;
        }

        public void setState(String state) {
            this.state = state;
        }

        public String getCounty() {
            return county;
        }

        public void setCounty(String county) {
            this.county = county;
        }
    }
    public static class Student
    {
         private int ID;
         private String name;
         private Address address;

        Student()
        {
            ID=1234;
            name="Alex";
        }
        Student(int ID,String name,String city ,String state,String county)
        {
            this.ID=ID;
            this.name=name;
            address.setCity(city);
            address.setCounty(county);
            address.setState(state);
            
       }
        public int getID() {
            return ID;
        }

        public void setID(int ID) {
            this.ID = ID;
        }

        public String getName() {
            return name;
        }

        public void setName(String name) {
            this.name = name;
        }
    }
    
}
