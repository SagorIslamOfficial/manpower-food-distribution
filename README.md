<p align="center">
<h3>A task of XYZ Company (Test)</h3>
</p>

# About Manpower Food Distribution

Short name MPFD is a test purpose task assigned by XYZ Company. I will share the requirements they wanted.

## In-text version of requirements

Overview:
- **[1· Manpower Management:]**
    - Collect manpower numbers for four shifts: General, A, B, and C.
    - **Lunch Distribution:**
      - Collect number of people Served to General, A, and B shifts.
      - C shift does not take lunch.
    
    - **Snacks Distribution:**
      - **Morning**: Based on A shift and General shift manpower.
      - **Afternoon**: Based on B and C shift manpower.
      
- **[2· Menu Management:]**
    - Assign Snacks and lunch menus on a weekly and daily basis.
    - Include approximate item qty per person for each menu item. (Both Snacks & Lunch)

- **[3· Prediction and Reporting:]**
    - Snacks:
      - Predict the quantity required for both morning and afternoon shifts individually, as well as for the next day, depending on the previous average manpower.
    - Lunch:
      - Predict the number of people who will take lunch today and the next day, depending on the previous average manpower.
    - Item Qty Calculation:
      - Calculate the quantity of the menu items for both snacks and lunch.
  
- **[4· Note:]**
  1. Don’t focus on UI Design. 
  2. Use Laravel’s default Authentication. Don’t use any scaffolding authentication like: Breeze.

## The Image

![Dining   Snacks Management System](https://github.com/user-attachments/assets/b8af8ee3-239a-4ff9-a1e5-7857a9eeba6f)

## License

MPFD is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
