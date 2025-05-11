# CISC3003 Individual Project  
**Author**: LiangLinda (DC126331)  

## 📖 Abstract  
This project consists of two parts, focusing on web development with PHP and MySQL:  
- **Part A**: A shopping cart system with checkout functionality, built using **Bootstrap 4, PHP, MySQLi, and Ajax**.  
- **Part B**: An object-oriented PHP authentication system for beginners, covering login, registration, user profiles, and password recovery.  

---

## 🛠️ Features  

### Part A: Shopping Cart System  
1. **Product Management**  
   - Display all products from the database.  
   - Add/remove items from the cart.  
   - Adjust item quantities.  
   - Clear the entire cart.  
2. **Checkout Process**  
   - Complete order placement with database integration.  
   - Order details stored in the database.  

### Part B: Authentication System  
1. **User Authentication**  
   - Secure login and registration system.  
   - User profile page for updating personal information.  
2. **Password Management**  
   - Password reset functionality via email.  
3. **Practice Modules**  
   - Multiple implementations for learning purposes (e.g., `Login & Register`, `Signup & Password Reset`).  

---

## 🚀 Accomplishments  

### Part A  
- Fully functional shopping cart with real-time database synchronization.  
- Checkout system that records orders in the database.  

### Part B  
- Robust OOP-based authentication system.  
- Secure password recovery mechanism.  
- User-friendly profile management.  

---

## 📝 Incomplete / Future Improvements  
- **Multi-User Support**:  
  - Current cart and checkout data are not user-specific (visible to all visitors).  
  - **Planned Fix**:  
    - Integrate user authentication (Part B) with the shopping cart (Part A).  
    - Modify database schema to include `customer_id` in cart and order tables.  
    - Personalize user experience by querying data based on logged-in user IDs.  

---

## 🛠️ Technologies Used  
- **Frontend**: Bootstrap 4, Ajax  
- **Backend**: PHP (Procedural & OOP)  
- **Database**: MySQLi  
- **Features**: Session management, form validation, password encryption.  

---

## 🙏 Acknowledgments  
- Tutorial references from **DCodeMania** and other beginner-friendly PHP guides.  

---

**Note**: For detailed setup instructions, ensure the PHP environment and MySQL database are configured. Update database credentials in the project files to match your local/server settings.  
