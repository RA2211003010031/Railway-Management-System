# Railway Reservation System

## Overview
The **Railway Reservation System** is designed to manage all reservation-related functions efficiently. It enables passengers to book train tickets, check seat availability, view train schedules, and track their reservation status online.

Each zone in the system maintains:
- **Train Information** (Train name, schedule, availability, etc.)
- **Administrator Controls** (Modify train details like name, number, etc.)
- **Seat Reservation** (Check availability and reserve seats for passengers)
- **Unique PNR Generation** (A Passenger Name Record is assigned upon booking)
- **Reservation Cancellation** (Manage and delete bookings)
- **Online Reservation Status Check** (Passengers can check if their ticket is confirmed, RAC, or on the waiting list)
- **Reports & Ticket Printing** (Generate reservation charts, train reports, and tickets with details like train number, journey date, fare, and passenger details)
- **Cancellation Ticket Printing** (Displays fare deductions and refund amounts)

## Features
- **User-friendly Web Interface** for seamless ticket booking
- **Real-time Seat Availability Checking**
- **Secure and Efficient Database Management**
- **Dynamic Reports & Ticket Generation**
- **Admin Panel for System Management**

---
## Technologies Used
### Front-end:
- **HTML** – Structure web pages
- **CSS** – Style the web pages
- **Bootstrap** – Ensure responsive and mobile-friendly design
- **JavaScript** – Enhance user interactions

### Back-end:
- **PHP** – Handles server-side logic and database interaction
- **MySQL** – Database for storing reservation records and train schedules

### Software Requirements (Any one):
- **WAMP Server**
- **XAMPP Server**
- **MAMP Server**
- **LAMP Server**

---
## Installation Steps
1. **Download** the project ZIP file and extract it to your local server directory.
2. **Place the extracted folder** inside `c:/wamp/www/` (or the respective directory of your local server).
3. **Database Configuration:**
   - Open **phpMyAdmin**.
   - Create a new database named **railres**.
   - Import `railres.sql` from the downloaded folder (inside the `database` directory).
4. **Run the Project:**
   - Open your web browser.
   - Navigate to `http://localhost/railway-reservation-system/`

---
## Additional Features (Future Enhancements)
- **Online Payment Integration**
- **Mobile Application Support**
- **Automated Email & SMS Notifications**
- **AI-based Seat Suggestions**

---
## Thank You! 🚆🎫
For any issues or queries, feel free to contact the development team. Happy Traveling! 😊
