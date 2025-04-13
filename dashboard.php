<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['is_logged_in']) || !$_SESSION['is_logged_in']) {
    header('Location: index.php');
    exit;
}

include 'header.php';
?>

<div class="min-h-screen bg-gradient-to-b from-pink-50 to-white">
    <!-- Dashboard Header -->
    <header class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-playfair font-bold text-gray-900">Dashboard</h1>
                    <p class="text-gray-600">Welcome back, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</p>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="create_invitation.php" 
                       class="bg-gradient-to-r from-pink-500 to-purple-600 text-white px-6 py-2 rounded-full hover:opacity-90 transition-opacity">
                        <i class="fas fa-plus mr-2"></i>New Invitation
                    </a>
                    <div class="relative group">
                        <button class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&background=random" 
                                 alt="Profile" 
                                 class="w-10 h-10 rounded-full">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 hidden group-hover:block">
                            <a href="profile.php" class="block px-4 py-2 text-gray-700 hover:bg-pink-50">
                                <i class="fas fa-user mr-2"></i>Profile
                            </a>
                            <a href="settings.php" class="block px-4 py-2 text-gray-700 hover:bg-pink-50">
                                <i class="fas fa-cog mr-2"></i>Settings
                            </a>
                            <hr class="my-2">
                            <a href="logout.php" class="block px-4 py-2 text-red-600 hover:bg-red-50">
                                <i class="fas fa-sign-out-alt mr-2"></i>Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Dashboard Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Active Invitations</p>
                        <h3 class="text-3xl font-bold">12</h3>
                    </div>
                    <div class="w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center text-pink-500">
                        <i class="fas fa-envelope text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Total Views</p>
                        <h3 class="text-3xl font-bold">1,234</h3>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center text-purple-500">
                        <i class="fas fa-eye text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">RSVP Responses</p>
                        <h3 class="text-3xl font-bold">89</h3>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-500">
                        <i class="fas fa-check-circle text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Digital Gifts</p>
                        <h3 class="text-3xl font-bold">Rp 5.4M</h3>
                    </div>
                    <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center text-yellow-500">
                        <i class="fas fa-gift text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Invitations -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-12">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold">Recent Invitations</h2>
                <a href="invitations.php" class="text-pink-500 hover:text-pink-600">
                    View All <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left border-b">
                            <th class="pb-4">Event</th>
                            <th class="pb-4">Date</th>
                            <th class="pb-4">Views</th>
                            <th class="pb-4">RSVP</th>
                            <th class="pb-4">Status</th>
                            <th class="pb-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <tr class="hover:bg-gray-50">
                            <td class="py-4">
                                <div class="flex items-center">
                                    <img src="https://images.pexels.com/photos/2959192/pexels-photo-2959192.jpeg" 
                                         alt="Wedding" 
                                         class="w-10 h-10 rounded-lg object-cover mr-3">
                                    <div>
                                        <p class="font-semibold">John & Sarah's Wedding</p>
                                        <p class="text-sm text-gray-500">Elegant Theme</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4">Jun 15, 2024</td>
                            <td class="py-4">456</td>
                            <td class="py-4">34</td>
                            <td class="py-4">
                                <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">Active</span>
                            </td>
                            <td class="py-4">
                                <div class="flex space-x-2">
                                    <button class="text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-green-500 hover:text-green-700">
                                        <i class="fas fa-share"></i>
                                    </button>
                                    <button class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-6">Quick Actions</h2>
                <div class="grid grid-cols-2 gap-4">
                    <a href="create_invitation.php" class="flex items-center p-4 bg-pink-50 rounded-lg hover:bg-pink-100">
                        <i class="fas fa-plus-circle text-pink-500 text-2xl mr-3"></i>
                        <div>
                            <p class="font-semibold">New Invitation</p>
                            <p class="text-sm text-gray-500">Create a new invitation</p>
                        </div>
                    </a>
                    <a href="templates.php" class="flex items-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100">
                        <i class="fas fa-paint-brush text-purple-500 text-2xl mr-3"></i>
                        <div>
                            <p class="font-semibold">Templates</p>
                            <p class="text-sm text-gray-500">Browse templates</p>
                        </div>
                    </a>
                    <a href="guests.php" class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100">
                        <i class="fas fa-users text-blue-500 text-2xl mr-3"></i>
                        <div>
                            <p class="font-semibold">Guest List</p>
                            <p class="text-sm text-gray-500">Manage guests</p>
                        </div>
                    </a>
                    <a href="gifts.php" class="flex items-center p-4 bg-yellow-50 rounded-lg hover:bg-yellow-100">
                        <i class="fas fa-gift text-yellow-500 text-2xl mr-3"></i>
                        <div>
                            <p class="font-semibold">Digital Gifts</p>
                            <p class="text-sm text-gray-500">View received gifts</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-6">Recent Activity</h2>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center text-green-500 mr-3">
                            <i class="fas fa-check"></i>
                        </div>
                        <div>
                            <p class="font-semibold">New RSVP Response</p>
                            <p class="text-sm text-gray-500">2 minutes ago</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center text-blue-500 mr-3">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div>
                            <p class="font-semibold">100 New Views</p>
                            <p class="text-sm text-gray-500">15 minutes ago</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center text-yellow-500 mr-3">
                            <i class="fas fa-gift"></i>
                        </div>
                        <div>
                            <p class="font-semibold">New Digital Gift Received</p>
                            <p class="text-sm text-gray-500">1 hour ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include 'footer.php'; ?>
