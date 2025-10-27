# 🚀 How to Run Your Restaurant Management Project

## ✅ Project Status: READY TO RUN!

Your project now has all the necessary assets and is ready to run. Here's how to get it working:

## 🛠️ Quick Setup Guide

### **Step 1: Start Your Web Server**

#### **Option A: XAMPP (Recommended)**
1. **Download & Install XAMPP**: https://www.apachefriends.org/
2. **Start Services**:
   - Open XAMPP Control Panel
   - Start **Apache** (web server)
   - Start **MySQL** (database)
3. **Copy Project**: Move your project folder to `C:\xampp\htdocs\restaurant-project\`

#### **Option B: WAMP (Windows)**
1. **Download & Install WAMP**: https://www.wampserver.com/
2. **Start WAMP**: All services should start automatically
3. **Copy Project**: Move to `C:\wamp64\www\restaurant-project\`

#### **Option C: MAMP (Mac)**
1. **Download & Install MAMP**: https://www.mamp.info/
2. **Start MAMP**: Start Apache and MySQL
3. **Copy Project**: Move to `/Applications/MAMP/htdocs/restaurant-project/`

#### **Option D: PHP Built-in Server (Quick Test)**
```bash
# Navigate to your project directory
cd /Users/akanksha/Desktop/DBMS-mini-project/DBMS-mini-project

# Start PHP server
php -S localhost:8000
```

### **Step 2: Set Up Database**

#### **Method 1: Automatic Setup (Easiest)**
1. Open browser and go to: `http://localhost/restaurant-project/setup_database.php`
2. The script will automatically:
   - Create the database
   - Set up all tables
   - Load sample data
   - Show success message

#### **Method 2: Manual Setup**
1. **Open phpMyAdmin**: `http://localhost/phpmyadmin`
2. **Create Database**:
   ```sql
   CREATE DATABASE restaurant_management;
   ```
3. **Import Schema**: Upload `database/restaurant_db.sql`
4. **Load Sample Data**: Upload `database/init_sample_data.sql`

### **Step 3: Access Your Website**

Open your browser and navigate to:
- **XAMPP/WAMP**: `http://localhost/restaurant-project/`
- **MAMP**: `http://localhost:8888/restaurant-project/`
- **PHP Server**: `http://localhost:8000/`

## 🎯 What You Should See

### **Homepage Features:**
- ✅ Beautiful restaurant website with proper styling
- ✅ Hero section with video background
- ✅ Navigation menu
- ✅ Menu section with food items
- ✅ Chef profiles
- ✅ Testimonials carousel
- ✅ Contact form
- ✅ Reservation form

### **Working Forms:**
- ✅ **Reservation Form**: Book a table
- ✅ **Contact Form**: Send messages
- ✅ **Newsletter**: Subscribe to updates

## 🔧 Testing Your Project

### **1. Test the Website**
- [ ] Website loads with proper styling
- [ ] All images display correctly
- [ ] Navigation menu works
- [ ] Responsive design works on mobile

### **2. Test the Forms**
- [ ] **Reservation Form**: Try booking a table
- [ ] **Contact Form**: Send a test message
- [ ] **Newsletter**: Subscribe with test email

### **3. Test the Database**
- [ ] Check phpMyAdmin: `http://localhost/phpmyadmin`
- [ ] Verify data is stored in tables
- [ ] Check reservations, contact messages, newsletter subscriptions

## 📊 Database Tables Created

Your project includes these database tables:
- `reservations` - Table bookings
- `contact_messages` - Contact form submissions
- `newsletter_subscriptions` - Email subscribers
- `menu_categories` - Menu categories
- `menu_items` - Food items with prices
- `chefs` - Staff information
- `testimonials` - Customer reviews
- `events` - Restaurant events
- `restaurant_info` - Restaurant details

## 🎨 Customization Options

### **Change Restaurant Information**
Edit `database/init_sample_data.sql` and update:
- Restaurant name
- Address and contact info
- Menu items and prices
- Chef profiles

### **Modify Styling**
Edit `assets/css/main.css` to change:
- Colors (CSS variables at the top)
- Fonts
- Layout styles

### **Add New Menu Items**
```sql
INSERT INTO menu_items (category_id, name, description, price) 
VALUES (1, 'New Dish', 'Description', 15.99);
```

## 🚨 Troubleshooting

### **Problem: Website looks broken**
**Solution**: Check that `assets/` folder is in the correct location

### **Problem: Forms don't work**
**Solution**: 
- Ensure Apache is running
- Check PHP is enabled
- Verify file permissions

### **Problem: Database connection failed**
**Solution**:
- Start MySQL service
- Check credentials in `config/database.php`
- Verify database exists

### **Problem: 404 errors**
**Solution**:
- Use correct localhost URL
- Check file paths
- Ensure web server is running

## 📱 Mobile Testing

Test your website on mobile devices:
- Open browser developer tools (F12)
- Toggle device toolbar
- Test different screen sizes
- Verify responsive design

## 🎉 Success Indicators

You'll know everything is working when:
- ✅ Website loads with beautiful styling
- ✅ All forms submit successfully
- ✅ Data appears in database
- ✅ No console errors in browser
- ✅ Mobile responsive design works

## 🔄 Next Steps

Once everything is working:
1. **Customize Content**: Update restaurant info, menu, etc.
2. **Add More Features**: Email notifications, admin panel
3. **Deploy Online**: Upload to web hosting
4. **Add Analytics**: Track website visitors

## 📞 Need Help?

If you encounter issues:
1. Check the troubleshooting section above
2. Verify all services are running
3. Check browser console for errors
4. Ensure file permissions are correct

Your restaurant management system is now ready to use! 🎉
