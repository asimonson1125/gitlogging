

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment - Nations</title>
    <link rel="stylesheet" type="text/css" href="design/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .main-content {
            margin-left: 220px;
            padding: 15px;
            padding-bottom: 60px;
        }

        .content {
            max-width: 1400px;
            margin: 0 auto;
        }

        .equipment-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px 0;
        }

        .equipment-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .equipment-header {
            padding: 15px 20px;
            margin-bottom: 0;
            position: relative;
            z-index: 5;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .rarity-common .equipment-header {
            background: transparent;
        }

        .rarity-uncommon .equipment-header {
            background: #2a9d38;
            color: white;
        }

        .rarity-rare .equipment-header {
            background: #0066cc;
            color: white;
        }

        .rarity-epic .equipment-header {
            background: #6a1b9a;
            color: white;
        }

        .rarity-legendary .equipment-header {
            background: #e65100;
            color: white;
        }

        .equipment-name {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .equipment-type {
            font-size: 0.9em;
            color: #666;
            transition: color 0.2s;
            margin-top: 5px;
            align-self: flex-start;
        }

        .equipment-content {
            padding: 15px;
            position: relative;
            z-index: 3;
            border-radius: 0 0 8px 8px;
        }

        .has-foil .equipment-content {
            background: url('resources/foil.gif');
            background-size: cover;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 10px 0;
            border-top: 1px solid #dee2e6;
            width: calc(100% - 200px);
            position: fixed;
            bottom: 0;
            right: 0;
            z-index: 6;
            margin-left: 200px;
        }

        .rarity-uncommon .equipment-type,
        .rarity-rare .equipment-type,
        .rarity-epic .equipment-type,
        .rarity-legendary .equipment-type,
        .rarity-uncommon .foil-indicator,
        .rarity-rare .foil-indicator,
        .rarity-epic .foil-indicator,
        .rarity-legendary .foil-indicator {
            color: rgba(255, 255, 255, 0.9);
        }

        .buff-list {
            position: relative;
            z-index: 4;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 4px;
            padding: 10px;
        }

        .buff-item {
            padding: 5px 0;
            color: #444;
        }

        .foil-indicator {
            font-size: 0.8em;
            color: #666;
            font-style: italic;
            margin-top: 5px;
            position: relative;
        }

        .equipment-name-container {
            display: flex;
            align-items: center;
            gap: 8px;
            justify-content: flex-start;
            width: 100%;
        }

        .rename-equipment-btn {
            background: none;
            border: 1px solid currentColor;
            color: inherit;
            cursor: pointer;
            font-size: 0.8em;
            padding: 4px 8px;
            border-radius: 4px;
            transition: all 0.3s ease;
            opacity: 0.8;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .rename-equipment-btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
            opacity: 1;
        }

        .rename-equipment-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .rename-equipment-btn i {
            font-size: 0.9em;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 25px;
            border: none;
            width: 90%;
            max-width: 400px;
            border-radius: 8px;
            position: relative;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .modal h2 {
            margin: 0 0 20px 0;
            color: #333;
            font-size: 1.4em;
        }

        .form-group {
            margin-bottom: 20px;
            width: 100%;
            box-sizing: border-box;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1em;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }

        .form-group input:focus {
            outline: none;
            border-color: #4CAF50;
        }

        .submit-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #45a049;
        }

        .close {
            position: absolute;
            right: 15px;
            top: 10px;
            color: #aaa;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s;
        }

        .close:hover {
            color: #333;
        }

        .filter-section {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            background: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .filter-label {
            color: #666;
            font-size: 0.9em;
            text-transform: uppercase;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: white;
            font-size: 0.9em;
            color: #333;
            cursor: pointer;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23333' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 1em;
            min-width: 200px;
        }

        select:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 0 2px rgba(74, 175, 80, 0.2);
        }

        select:hover {
            border-color: #4CAF50;
        }

        select[multiple] {
            height: auto;
            padding: 0;
            background-image: none;
        }

        select[multiple] option {
            padding: 8px 10px;
        }

        select[multiple] option:checked {
            background: linear-gradient(0deg, #4CAF50 0%, #4CAF50 100%);
            color: white;
        }

        .trade-in-controls {
            position: fixed;
            bottom: 0;
            right: 0;
            width: calc(100% - 220px);
            background: white;
            padding: 15px;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
            display: none;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
        }

        .trade-in-btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .trade-in-btn:hover {
            background: #0056b3;
        }

        .trade-in-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
        }

        .trade-in-checkbox {
            margin-right: 8px;
        }

        .trade-in-summary {
            font-size: 0.9em;
            color: #666;
        }

        .search-bar {
            flex: 1;
            margin-right: 15px;
        }

        .search-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 0.9em;
            color: #333;
        }

        .search-input:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 0 2px rgba(74, 175, 80, 0.2);
        }

        .select-all-btn {
            background: #6c757d;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9em;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .select-all-btn:hover {
            background: #5a6268;
        }

        .select-all-btn i {
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="sidebar">
    <nav>
        <ul>
            <li><a href="home.php" ><i class="fas fa-home"></i> Home</a></li>
            <li><a href="land.php" ><i class="fas fa-map"></i> Land</a></li>
            <li><a href="industry.php" ><i class="fas fa-industry"></i> Industry</a></li>

            <li><a href="buildings.php" ><i class="fas fa-building"></i> Buildings</a></li>
            <li><a href="resources.php" ><i class="fas fa-tree"></i> Natural Resources</a></li>
            
            <!-- Trade Category -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle">
                    <span><i class="fas fa-exchange-alt"></i> Trade</span>
                    <i class="fas fa-chevron-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="trade.php" ><i class="fas fa-money-bill-transfer"></i> Trade</a></li>
                    <li><a href="trade_analytics.php" ><i class="fas fa-chart-line"></i> Trade Analytics</a></li>
                </ul>
            </li>

            <li><a href="alliance.php" ><i class="fas fa-handshake"></i> Alliance</a></li>
            
            <!-- Military Category -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle">
                    <span><i class="fas fa-shield-alt"></i> Military</span>
                    <i class="fas fa-chevron-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="military.php" ><i class="fas fa-flag"></i> Military Overview</a></li>
                    <li><a href="recruitment.php" ><i class="fas fa-user-plus"></i> Recruitment</a></li>
                    <li><a href="battles.php" ><i class="fas fa-crosshairs"></i> Battle Reports</a></li>
                    <li><a href="missions.php" ><i class="fas fa-tasks"></i> Missions</a></li>
                    <li><a href="mtl.php" ><i class="fas fa-person-rifle"></i> Military Training League</a></li>
                </ul>
            </li>

            <!-- Equipment Category -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle">
                    <span><i class="fas fa-tools"></i> Equipment</span>
                    <i class="fas fa-chevron-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="equipment.php" class="active"><i class="fas fa-wrench"></i> Equipment</a></li>
                    <li><a href="loot_crates.php" ><i class="fas fa-box-open"></i> Loot Crate Shop</a></li>
                </ul>
            </li>

            <!-- Cards Category -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle">
                    <span><i class="fas fa-diamond"></i> Cards</span>
                    <i class="fas fa-chevron-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="cards.php" ><i class="fas fa-diamond"></i> Cards</a></li>
                    <li><a href="card_pack_shop.php" ><i class="fas fa-box-open"></i> Card Pack Shop</a></li>
                </ul>
            </li>

            <!-- Leaderboards Category -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle">
                    <span><i class="fas fa-trophy"></i> Leaderboards</span>
                    <i class="fas fa-chevron-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="leaderboard.php" ><i class="fas fa-medal"></i> Nation Leaderboard</a></li>
                    <li><a href="military_leaderboard.php" ><i class="fas fa-medal"></i> Military Leaderboard</a></li>
                    <li><a href="alliance_leaderboard.php" ><i class="fas fa-users"></i> Alliance Leaderboard</a></li>
                </ul>
            </li>

            <li><a href="notifications.php" ><i class="fas fa-bell"></i> Notifications</a></li>
            <li><a href="https://nations.miraheze.org/wiki/Rules"><i class="fas fa-gavel"></i> Rules</a></li>
            <li><a href="https://discord.gg/b6VBBDKWSG"><i class="fab fa-discord"></i> Discord Server</a></li>
            <li><a href="donate.php" ><i class="fas fa-heart"></i> Donate</a></li>
            <li><a href="https://nations.miraheze.org/wiki/Main_Page"><i class="fas fa-book"></i> Wiki</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
        <div class="version-info">v0.10.1-beta</div>
        <div class="version-info">Join the official Discord Server to interact with the community and be notified of updates!</div>
        <div class="turn-info">
            <div class="turn-timer">
                Next turn in: 00:42            </div>
            <div class="turn-timer">
                Next day in: 04:42            </div>
        </div>
    </nav>
</div>

<style>
    .sidebar {
        width: 220px;
        background-color: #2c3e50;
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        border-right: 1px solid rgba(255, 255, 255, 0.1);
        z-index: 500;
        display: flex;
        flex-direction: column;
        overflow-y: auto;
    }

    .sidebar nav {
        flex-grow: 1;
    }

    .version-info {
        padding: 12px;
        text-align: center;
        font-size: 0.75em;
        color: #95a5a6;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .sidebar nav ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .sidebar nav ul li {
        padding: 2px 0;
    }

    .sidebar nav ul li a {
        text-decoration: none;
        color: #ecf0f1;
        display: block;
        padding: 8px 16px;
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
        text-align: left;
        font-size: 0.9em;
    }

    .sidebar nav ul li a:hover {
        background-color: #34495e;
        border-left-color: #3498db;
    }

    .sidebar nav ul li a.active {
        background-color: #34495e;
        border-left-color: #3498db;
        font-weight: 600;
    }

    .sidebar::-webkit-scrollbar {
        width: 8px;
    }

    .sidebar::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.1);
    }

    .sidebar::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 4px;
    }

    .sidebar::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.3);
    }

    .sidebar {
        scrollbar-width: thin;
        scrollbar-color: rgba(255, 255, 255, 0.2) rgba(0, 0, 0, 0.1);
    }

    .rules-section ul li {
        margin-bottom: 10px;
        line-height: 1.5;
    }

    .turn-info {
        padding: 12px;
        background-color: #34495e;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .turn-timer {
        color: #ecf0f1;
        font-size: 0.9em;
        text-align: center;
        margin: 4px 0;
    }

    /* Add these new styles for the dropdown functionality */
    .dropdown-toggle {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .dropdown-toggle i {
        font-size: 0.8em;
        transition: transform 0.3s ease;
    }

    .dropdown.active .dropdown-toggle i {
        transform: rotate(180deg);
    }

    .dropdown-menu {
        display: none;
        padding-left: 20px;
        background-color: #34495e;
    }

    .dropdown.active .dropdown-menu {
        display: block;
    }

    .dropdown-menu li a {
        padding: 6px 16px;
        font-size: 0.85em;
    }

    /* Add this to your existing styles */
    .sidebar nav ul li.dropdown {
        padding: 0;
    }

    .sidebar nav ul li.dropdown > a {
        padding: 8px 16px;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get all dropdown toggles
    const dropdowns = document.querySelectorAll('.dropdown-toggle');
    
    // Add click event listener to each dropdown
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('click', function(e) {
            e.preventDefault();
            const parent = this.parentElement;
            
            // Close all other dropdowns
            document.querySelectorAll('.dropdown').forEach(item => {
                if (item !== parent) {
                    item.classList.remove('active');
                }
            });
            
            // Toggle current dropdown
            parent.classList.toggle('active');
        });
    });

    // Set active dropdown based on current page
    const currentPage = 'equipment.php';
    const activeLink = document.querySelector(`a[href="${currentPage}"]`);
    if (activeLink) {
        const parentDropdown = activeLink.closest('.dropdown');
        if (parentDropdown) {
            parentDropdown.classList.add('active');
        }
    }
});
</script>


    
    <div class="main-content">
        <div class="content">
            <h1>Equipment</h1>
            <form id="tradeInForm">
                <div class="filter-section">
                    <div class="search-bar">
                        <input type="text" id="search-input" class="search-input" placeholder="Search equipment by name...">
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">Type</label>
                        <select id="type-filter">
                            <option value="">All Types</option>
                            <option value="Infantry Accessory">Infantry Accessory</option>
                            <option value="Body Armour">Body Armour</option>
                            <option value="Infantry Weapon">Infantry Weapon</option>
                            <option value="Heavy Accessory">Heavy Accessory</option>
                            <option value="Crew">Crew</option>
                            <option value="Engine">Engine</option>
                            <option value="Ammunition">Ammunition</option>
                            <option value="Battle Juice">Battle Juice</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">Rarity</label>
                        <select id="rarity-filter">
                            <option value="">All Rarities</option>
                            <option value="Common">Common</option>
                            <option value="Uncommon">Uncommon</option>
                            <option value="Rare">Rare</option>
                            <option value="Epic">Epic</option>
                            <option value="Legendary">Legendary</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">Foils</label>
                        <select id="foil-filter">
                            <option value="">Show Regular and Foil</option>
                            <option value="nofoil">Show Regular</option>
                            <option value="noregular">Show Foil</option>
                        </select>
                    </div>
                    <button type="button" class="trade-in-btn" id="sortBtn"><i class="fas fa-check-square"></i>Sort By Rarity</button>
                    <button type="button" class="select-all-btn" id="selectAllBtn">
                        <i class="fas fa-check-square"></i> Select All Visible
                    </button>
                </div>
                <div class="equipment-grid" id="equipmentGrid">
                                            <div class="equipment-card rarity-rare"
     data-type="Infantry Weapon"
     data-rarity="Rare"
     data-equipped="false"
     data-equipment-id="1931688">
    <div class="equipment-header">
        <div class="equipment-name-container">
            <input type="checkbox" class="trade-in-checkbox" name="trade_in_items[]" value="1931688" >
            <div class="equipment-name">Infantry Weapon</div>
                    </div>
        <div class="equipment-type">Rare Infantry Weapon</div>
    </div>
    <div class="equipment-content">
        <div class="buff-list">
                            <div class="buff-item">
                    +40 HP                </div>
                    </div>
    </div>
</div>                                            <div class="equipment-card rarity-uncommon"
     data-type="Infantry Weapon"
     data-rarity="Uncommon"
     data-equipped="false"
     data-equipment-id="1931695">
    <div class="equipment-header">
        <div class="equipment-name-container">
            <input type="checkbox" class="trade-in-checkbox" name="trade_in_items[]" value="1931695" >
            <div class="equipment-name">Infantry Weapon</div>
                    </div>
        <div class="equipment-type">Uncommon Infantry Weapon</div>
    </div>
    <div class="equipment-content">
        <div class="buff-list">
                            <div class="buff-item">
                    +20 HP                </div>
                    </div>
    </div>
</div>                                            <div class="equipment-card rarity-rare"
     data-type="Infantry Weapon"
     data-rarity="Rare"
     data-equipped="false"
     data-equipment-id="1931700">
    <div class="equipment-header">
        <div class="equipment-name-container">
            <input type="checkbox" class="trade-in-checkbox" name="trade_in_items[]" value="1931700" >
            <div class="equipment-name">Infantry Weapon</div>
                    </div>
        <div class="equipment-type">Rare Infantry Weapon</div>
    </div>
    <div class="equipment-content">
        <div class="buff-list">
                            <div class="buff-item">
                    +4 Armour                </div>
                    </div>
    </div>
</div>                                            <div class="equipment-card rarity-uncommon"
     data-type="Infantry Accessory"
     data-rarity="Uncommon"
     data-equipped="false"
     data-equipment-id="1932137">
    <div class="equipment-header">
        <div class="equipment-name-container">
            <input type="checkbox" class="trade-in-checkbox" name="trade_in_items[]" value="1932137" >
            <div class="equipment-name">Infantry Accessory</div>
                    </div>
        <div class="equipment-type">Uncommon Infantry Accessory</div>
    </div>
    <div class="equipment-content">
        <div class="buff-list">
                            <div class="buff-item">
                    +2 Maneuver                </div>
                    </div>
    </div>
</div>                                            <div class="equipment-card rarity-uncommon has-foil"
     data-type="Infantry Weapon"
     data-rarity="Uncommon"
     data-equipped="false"
     data-equipment-id="1932139">
    <div class="equipment-header">
        <div class="equipment-name-container">
            <input type="checkbox" class="trade-in-checkbox" name="trade_in_items[]" value="1932139" >
            <div class="equipment-name">Infantry Weapon</div>
                            <span class="foil-indicator">(Foil)</span>
                    </div>
        <div class="equipment-type">Uncommon Infantry Weapon</div>
    </div>
    <div class="equipment-content">
        <div class="buff-list">
                            <div class="buff-item">
                    +4 Armour                </div>
                    </div>
    </div>
</div>                                            <div class="equipment-card rarity-uncommon"
     data-type="Infantry Accessory"
     data-rarity="Uncommon"
     data-equipped="false"
     data-equipment-id="1932150">
    <div class="equipment-header">
        <div class="equipment-name-container">
            <input type="checkbox" class="trade-in-checkbox" name="trade_in_items[]" value="1932150" >
            <div class="equipment-name">Infantry Accessory</div>
                    </div>
        <div class="equipment-type">Uncommon Infantry Accessory</div>
    </div>
    <div class="equipment-content">
        <div class="buff-list">
                            <div class="buff-item">
                    +20 HP                </div>
                    </div>
    </div>
</div>                                            <div class="equipment-card rarity-uncommon"
     data-type="Infantry Weapon"
     data-rarity="Uncommon"
     data-equipped="false"
     data-equipment-id="1932152">
    <div class="equipment-header">
        <div class="equipment-name-container">
            <input type="checkbox" class="trade-in-checkbox" name="trade_in_items[]" value="1932152" >
            <div class="equipment-name">Infantry Weapon</div>
                    </div>
        <div class="equipment-type">Uncommon Infantry Weapon</div>
    </div>
    <div class="equipment-content">
        <div class="buff-list">
                            <div class="buff-item">
                    +20 HP                </div>
                    </div>
    </div>
</div>                                            <div class="equipment-card rarity-rare"
     data-type="Infantry Weapon"
     data-rarity="Rare"
     data-equipped="false"
     data-equipment-id="1932155">
    <div class="equipment-header">
        <div class="equipment-name-container">
            <input type="checkbox" class="trade-in-checkbox" name="trade_in_items[]" value="1932155" >
            <div class="equipment-name">Infantry Weapon</div>
                    </div>
        <div class="equipment-type">Rare Infantry Weapon</div>
    </div>
    <div class="equipment-content">
        <div class="buff-list">
                            <div class="buff-item">
                    +4 Maneuver                </div>
                    </div>
    </div>
</div>                                            <div class="equipment-card rarity-uncommon"
     data-type="Infantry Weapon"
     data-rarity="Uncommon"
     data-equipped="false"
     data-equipment-id="1932158">
    <div class="equipment-header">
        <div class="equipment-name-container">
            <input type="checkbox" class="trade-in-checkbox" name="trade_in_items[]" value="1932158" >
            <div class="equipment-name">Infantry Weapon</div>
                    </div>
        <div class="equipment-type">Uncommon Infantry Weapon</div>
    </div>
    <div class="equipment-content">
        <div class="buff-list">
                            <div class="buff-item">
                    +20 HP                </div>
                    </div>
    </div>
</div>                                            <div class="equipment-card rarity-rare"
     data-type="Infantry Accessory"
     data-rarity="Rare"
     data-equipped="false"
     data-equipment-id="1932199">
    <div class="equipment-header">
        <div class="equipment-name-container">
            <input type="checkbox" class="trade-in-checkbox" name="trade_in_items[]" value="1932199" >
            <div class="equipment-name">Infantry Accessory</div>
                    </div>
        <div class="equipment-type">Rare Infantry Accessory</div>
    </div>
    <div class="equipment-content">
        <div class="buff-list">
                            <div class="buff-item">
                    +4 Maneuver                </div>
                    </div>
    </div>
</div>                                            <div class="equipment-card rarity-uncommon"
     data-type="Body Armour"
     data-rarity="Uncommon"
     data-equipped="false"
     data-equipment-id="1932331">
    <div class="equipment-header">
        <div class="equipment-name-container">
            <input type="checkbox" class="trade-in-checkbox" name="trade_in_items[]" value="1932331" >
            <div class="equipment-name">Body Armour</div>
                    </div>
        <div class="equipment-type">Uncommon Body Armour</div>
    </div>
    <div class="equipment-content">
        <div class="buff-list">
                            <div class="buff-item">
                    +20 HP                </div>
                    </div>
    </div>
</div>                                            <div class="equipment-card rarity-uncommon"
     data-type="Infantry Weapon"
     data-rarity="Uncommon"
     data-equipped="false"
     data-equipment-id="1932372">
    <div class="equipment-header">
        <div class="equipment-name-container">
            <input type="checkbox" class="trade-in-checkbox" name="trade_in_items[]" value="1932372" >
            <div class="equipment-name">Infantry Weapon</div>
                    </div>
        <div class="equipment-type">Uncommon Infantry Weapon</div>
    </div>
    <div class="equipment-content">
        <div class="buff-list">
                            <div class="buff-item">
                    +2 Firepower                </div>
                    </div>
    </div>
</div>                                            <div class="equipment-card rarity-uncommon"
     data-type="Infantry Accessory"
     data-rarity="Uncommon"
     data-equipped="false"
     data-equipment-id="1932406">
    <div class="equipment-header">
        <div class="equipment-name-container">
            <input type="checkbox" class="trade-in-checkbox" name="trade_in_items[]" value="1932406" >
            <div class="equipment-name">Infantry Accessory</div>
                    </div>
        <div class="equipment-type">Uncommon Infantry Accessory</div>
    </div>
    <div class="equipment-content">
        <div class="buff-list">
                            <div class="buff-item">
                    +2 Armour                </div>
                    </div>
    </div>
</div>                                            <div class="equipment-card rarity-rare"
     data-type="Infantry Weapon"
     data-rarity="Rare"
     data-equipped="false"
     data-equipment-id="1932408">
    <div class="equipment-header">
        <div class="equipment-name-container">
            <input type="checkbox" class="trade-in-checkbox" name="trade_in_items[]" value="1932408" >
            <div class="equipment-name">Infantry Weapon</div>
                    </div>
        <div class="equipment-type">Rare Infantry Weapon</div>
    </div>
    <div class="equipment-content">
        <div class="buff-list">
                            <div class="buff-item">
                    +40 HP                </div>
                    </div>
    </div>
</div>                                            <div class="equipment-card rarity-rare"
     data-type="Infantry Weapon"
     data-rarity="Rare"
     data-equipped="false"
     data-equipment-id="1932410">
    <div class="equipment-header">
        <div class="equipment-name-container">
            <input type="checkbox" class="trade-in-checkbox" name="trade_in_items[]" value="1932410" >
            <div class="equipment-name">Infantry Weapon</div>
                    </div>
        <div class="equipment-type">Rare Infantry Weapon</div>
    </div>
    <div class="equipment-content">
        <div class="buff-list">
                            <div class="buff-item">
                    +4 Maneuver                </div>
                    </div>
    </div>
</div>                                            <div class="equipment-card rarity-rare"
     data-type="Body Armour"
     data-rarity="Rare"
     data-equipped="false"
     data-equipment-id="1932412">
    <div class="equipment-header">
        <div class="equipment-name-container">
            <input type="checkbox" class="trade-in-checkbox" name="trade_in_items[]" value="1932412" >
            <div class="equipment-name">Body Armour</div>
                    </div>
        <div class="equipment-type">Rare Body Armour</div>
    </div>
    <div class="equipment-content">
        <div class="buff-list">
                            <div class="buff-item">
                    +4 Firepower                </div>
                    </div>
    </div>
</div>                                            <div class="equipment-card rarity-uncommon"
     data-type="Body Armour"
     data-rarity="Uncommon"
     data-equipped="false"
     data-equipment-id="1932419">
    <div class="equipment-header">
        <div class="equipment-name-container">
            <input type="checkbox" class="trade-in-checkbox" name="trade_in_items[]" value="1932419" >
            <div class="equipment-name">Body Armour</div>
                    </div>
        <div class="equipment-type">Uncommon Body Armour</div>
    </div>
    <div class="equipment-content">
        <div class="buff-list">
                            <div class="buff-item">
                    +2 Armour                </div>
                    </div>
    </div>
</div>                                            <div class="equipment-card rarity-uncommon"
     data-type="Infantry Accessory"
     data-rarity="Uncommon"
     data-equipped="false"
     data-equipment-id="1932421">
    <div class="equipment-header">
        <div class="equipment-name-container">
            <input type="checkbox" class="trade-in-checkbox" name="trade_in_items[]" value="1932421" >
            <div class="equipment-name">Infantry Accessory</div>
                    </div>
        <div class="equipment-type">Uncommon Infantry Accessory</div>
    </div>
    <div class="equipment-content">
        <div class="buff-list">
                            <div class="buff-item">
                    +20 HP                </div>
                    </div>
    </div>
</div>                                            <div class="equipment-card rarity-rare"
     data-type="Infantry Weapon"
     data-rarity="Rare"
     data-equipped="false"
     data-equipment-id="1932425">
    <div class="equipment-header">
        <div class="equipment-name-container">
            <input type="checkbox" class="trade-in-checkbox" name="trade_in_items[]" value="1932425" >
            <div class="equipment-name">Infantry Weapon</div>
                    </div>
        <div class="equipment-type">Rare Infantry Weapon</div>
    </div>
    <div class="equipment-content">
        <div class="buff-list">
                            <div class="buff-item">
                    +4 Armour                </div>
                    </div>
    </div>
</div>                                            <div class="equipment-card rarity-uncommon"
     data-type="Infantry Weapon"
     data-rarity="Uncommon"
     data-equipped="false"
     data-equipment-id="1956622">
    <div class="equipment-header">
        <div class="equipment-name-container">
            <input type="checkbox" class="trade-in-checkbox" name="trade_in_items[]" value="1956622" >
            <div class="equipment-name">Infantry Weapon</div>
                    </div>
        <div class="equipment-type">Uncommon Infantry Weapon</div>
    </div>
    <div class="equipment-content">
        <div class="buff-list">
                            <div class="buff-item">
                    +20 HP                </div>
                    </div>
    </div>
</div>                                    </div>
                <div id="loadingIndicator" style="display: none; text-align: center; padding: 20px;">
                    <i class="fas fa-spinner fa-spin"></i> Loading more equipment...
                </div>
                <div class="trade-in-controls">
                    <div class="trade-in-summary">
                        Selected: <span id="selectedCount">0</span> items
                    </div>
                    <button type="submit" class="trade-in-btn" disabled id="tradeInBtn">
                        <i class="fas fa-exchange-alt"></i>
                        Trade In Equipment
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="footer">
         
<footer>
    <div class="resources-container">
                                    <div class="resource">
                    <span class="resource-name" 
                                                id="money-label" 
                            data-tooltip="Money: Income 25.2k per turn"
                        >
                        <img src='resources/money_icon.png' alt='money' title='Money' class='resource-icon'>                    </span>
                    <span class="resource-value" id="money-value"
                        style="color: #28a745;">
                        837.3k                    </span>
                </div>
                                                <div class="resource">
                    <span class="resource-name" 
                                                id="food-label" 
                            data-tooltip="Food: Consumption 151 per turn"
                        >
                        <img src='resources/food_icon.png' alt='food' title='Food' class='resource-icon'>                    </span>
                    <span class="resource-value" id="food-value"
                        style="color: #dc3545;">
                        16.6k                    </span>
                </div>
                                                <div class="resource">
                    <span class="resource-name" 
                                                id="power-label" 
                            data-tooltip="Power: Consumption 76 per turn"
                        >
                        <img src='resources/power_icon.png' alt='power' title='Power' class='resource-icon'>                    </span>
                    <span class="resource-value" id="power-value"
                        style="color: #dc3545;">
                        635.5k                    </span>
                </div>
                                                <div class="resource">
                    <span class="resource-name" 
                                                data-tooltip="Building Materials"
                        >
                        <img src='resources/building_materials_icon.png' alt='building_materials' title='Building Materials' class='resource-icon'>                    </span>
                    <span class="resource-value" id="building_materials-value"
                        >
                        113.4k                    </span>
                </div>
                                                <div class="resource">
                    <span class="resource-name" 
                                                id="consumer-goods-label" 
                            data-tooltip="Consumer Goods: Consumption 76 per turn"
                        >
                        <img src='resources/consumer_goods_icon.png' alt='consumer_goods' title='Consumer Goods' class='resource-icon'>                    </span>
                    <span class="resource-value" id="consumer_goods-value"
                        style="color: #dc3545;">
                        136.0k                    </span>
                </div>
                                                <div class="resource">
                    <span class="resource-name" 
                                                data-tooltip="Metal"
                        >
                        <img src='resources/metal_icon.png' alt='metal' title='Metal' class='resource-icon'>                    </span>
                    <span class="resource-value" id="metal-value"
                        >
                        190                    </span>
                </div>
                                                <div class="resource">
                    <span class="resource-name" 
                                                id="ammunition-label" 
                            data-tooltip="Ammunition: Consumption 0 per turn"
                        >
                        <img src='resources/ammunition_icon.png' alt='ammunition' title='Ammunition' class='resource-icon'>                    </span>
                    <span class="resource-value" id="ammunition-value"
                        style="color: #28a745;">
                        4.3k                    </span>
                </div>
                                                <div class="resource">
                    <span class="resource-name" 
                                                id="fuel-label" 
                            data-tooltip="Fuel: Consumption 0 per turn"
                        >
                        <img src='resources/fuel_icon.png' alt='fuel' title='Fuel' class='resource-icon'>                    </span>
                    <span class="resource-value" id="fuel-value"
                        style="color: #28a745;">
                        1.1k                    </span>
                </div>
                                                <div class="resource">
                    <span class="resource-name" 
                                                data-tooltip="Uranium"
                        >
                        <img src='resources/uranium_icon.png' alt='uranium' title='Uranium' class='resource-icon'>                    </span>
                    <span class="resource-value" id="uranium-value"
                        >
                        2.0k                    </span>
                </div>
                                                <div class="resource">
                    <span class="resource-name" 
                                                data-tooltip="WhZ"
                        >
                        <img src='resources/whz_icon.png' alt='whz' title='Whz' class='resource-icon'>                    </span>
                    <span class="resource-value" id="whz-value"
                        >
                        -                    </span>
                </div>
                                                <div class="resource">
                    <span class="resource-name" 
                                                data-tooltip="Loot Tokens"
                        >
                        <img src='resources/loot_token_icon.png' alt='loot_token' title='Loot Token' class='resource-icon'>                    </span>
                    <span class="resource-value" id="loot_token-value"
                        >
                        210                    </span>
                </div>
                                                <div class="resource">
                    <span class="resource-name" 
                                                data-tooltip="Funds"
                        >
                        <img src='resources/funds_icon.png' alt='funds' title='Funds' class='resource-icon'>                    </span>
                    <span class="resource-value" id="funds-value"
                        >
                        56.3k                    </span>
                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
</footer>

<style>
    .resources-container {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    .resource {
        margin: 5px 10px;
        font-size: 0.9em;
    }
    .resource-name {
        font-weight: bold;
        margin-right: 5px;
    }
    .resource-name[data-tooltip] {
        position: relative;
        cursor: pointer;
    }
    .resource-name[data-tooltip]::after {
        content: attr(data-tooltip);
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        background-color: #f0f0f0;
        color: #333;
        padding: 5px 10px;
        border-radius: 3px;
        white-space: nowrap;
        opacity: 0;
        transition: opacity 0.3s, visibility 0.3s;
        visibility: hidden;
        pointer-events: none;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        z-index: 2000;
    }
    .resource-name[data-tooltip]:hover::after {
        opacity: 1;
        visibility: visible;
    }
    .resource-icon {
        width: 16px;
        height: 16px;
        vertical-align: middle;
        margin-right: 4px;
    }
    .debug-box {
        background: #f5f5f5;
        border: 1px solid #ddd;
        padding: 10px;
        margin: 10px;
        font-family: monospace;
        font-size: 12px;
    }
    .debug-box hr {
        border: 1px solid #ddd;
        margin: 10px 0;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const resourceLabels = document.querySelectorAll('.resource-name[data-tooltip]');
    
    resourceLabels.forEach(label => {
        label.addEventListener('mouseenter', function() {
            const resourceType = this.id.replace('-label', '');
            fetch(`get_${resourceType}_info.php`)
                .then(response => response.json())
                .then(data => {
                    if (data.consumption !== undefined) {
                        this.setAttribute('data-tooltip', `Consumption: ${data.consumption} per turn`);
                    } else if (data.income_increase !== undefined) {
                        this.setAttribute('data-tooltip', `Income: $${data.income_increase} per turn`);
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
</script>
    </div>

    <!-- Rename Equipment Modal -->
    <div id="renameEquipmentModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeRenameModal()">&times;</span>
            <h2>Rename Equipment</h2>
            <form id="renameEquipmentForm">
                <input type="hidden" id="equipmentId" name="equipment_id">
                <div class="form-group">
                    <label for="newName">New Name:</label>
                    <input type="text" id="newName" name="new_name" required>
                </div>
                <button type="submit" class="submit-button">Rename</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('tradeInForm');
            const tradeInBtn = document.getElementById('tradeInBtn');
            const selectedCountSpan = document.getElementById('selectedCount');
            const checkboxes = document.querySelectorAll('.trade-in-checkbox');
            const typeFilter = document.getElementById('type-filter');
            const rarityFilter = document.getElementById('rarity-filter');
            const foilFilter = document.getElementById('foil-filter');
            const searchInput = document.getElementById('search-input');
            const tradeInControls = document.querySelector('.trade-in-controls');
            const selectAllBtn = document.getElementById('selectAllBtn');
            const sortBtn = document.getElementById('sortBtn');

            let currentFilters = { // Unused??
                type: '',
                rarity: '',
                foil: '',
                search: ''
            };

            function sortItemsByRarity() {
                // Select all items
                const grid = document.getElementById('equipmentGrid');
                const equipment = Array.from(grid.querySelectorAll('.equipment-card'));

                // Define the order of rarity
                const rarityOrder = ['Legendary', 'Epic', 'Rare', 'Uncommon', 'Common'];

                // Sort items
                equipment.sort((a, b) => {
                    const rarityA = a.getAttribute('data-rarity');
                    const rarityB = b.getAttribute('data-rarity');

                    // First, compare rarity
                    const rarityComparison = rarityOrder.indexOf(rarityA) - rarityOrder.indexOf(rarityB);

                    if (rarityComparison === 0) {
                        // If rarities are equal, prioritize by 'has-foil' class
                        const hasFoilA = a.classList.contains('has-foil') ? 1 : 0;
                        const hasFoilB = b.classList.contains('has-foil') ? 1 : 0;
                        return hasFoilB - hasFoilA; // Descending order for 'has-foil'
                    }

                    return rarityComparison;
                });

                // Clear current content
                grid.innerHTML = '';

                // Reinsert items in sorted order
                equipment.forEach(item => grid.appendChild(item));
            }

            sortBtn.onclick = sortItemsByRarity;

            function updateTradeInButton() {
                const selectedCount = document.querySelectorAll('.trade-in-checkbox:checked').length;
                selectedCountSpan.textContent = selectedCount;
                tradeInBtn.disabled = selectedCount === 0;
                tradeInControls.style.display = selectedCount > 0 ? 'flex' : 'none';
            }

            function filterEquipment() {
                const selectedType = typeFilter.value.toLowerCase();
                const selectedRarity = rarityFilter.value.toLowerCase();
                const selectedFoils = foilFilter.value;
                const searchTerm = searchInput.value.toLowerCase();
                const cards = document.querySelectorAll('.equipment-card');

                cards.forEach(card => {
                    const cardType = card.getAttribute('data-type').toLowerCase();
                    const cardRarity = card.getAttribute('data-rarity').toLowerCase();
                    const cardName = card.querySelector('.equipment-name').textContent.toLowerCase();
                    const cardFoil = card.classList.contains('has-foil');
                    
                    const typeMatch = !selectedType || cardType === selectedType;
                    const rarityMatch = !selectedRarity || cardRarity === selectedRarity;
                    const searchMatch = !searchTerm || cardName.includes(searchTerm);

                    let foilCriteria = true;
                    if (selectedFoils == 'nofoil') foilCriteria = cardFoil ? false : true;
                    if (selectedFoils == 'noregular') foilCriteria = cardFoil ? true : false;
                    
                    card.style.display = foilCriteria && typeMatch && rarityMatch && searchMatch ? 'block' : 'none';
                });

                // Update select all button state after filtering
                updateSelectAllButtonState();
            }

            function updateSelectAllButtonState() {
                const visibleCards = Array.from(document.querySelectorAll('.equipment-card'))
                    .filter(card => card.style.display !== 'none');
                
                const visibleCheckboxes = visibleCards
                    .map(card => card.querySelector('.trade-in-checkbox'))
                    .filter(checkbox => checkbox && !checkbox.disabled);
                
                const allChecked = visibleCheckboxes.length > 0 && 
                    visibleCheckboxes.every(checkbox => checkbox.checked);
                
                selectAllBtn.innerHTML = `<i class="fas fa-${allChecked ? 'square-minus' : 'check-square'}"></i> ${allChecked ? 'Deselect All' : 'Select All Visible'}`;
            }

            selectAllBtn.addEventListener('click', function() {
                // Get only visible cards (those that match current filters)
                const visibleCards = Array.from(document.querySelectorAll('.equipment-card'))
                    .filter(card => card.style.display !== 'none');
                
                // Get checkboxes from visible cards that aren't disabled
                const visibleCheckboxes = visibleCards
                    .map(card => card.querySelector('.trade-in-checkbox'))
                    .filter(checkbox => checkbox && !checkbox.disabled);
                
                // Check if all visible checkboxes are currently checked
                const allChecked = visibleCheckboxes.length > 0 && 
                    visibleCheckboxes.every(checkbox => checkbox.checked);

                // Toggle all visible checkboxes
                visibleCheckboxes.forEach(checkbox => {
                    checkbox.checked = !allChecked;
                });

                // Update UI states
                updateTradeInButton();
                updateSelectAllButtonState();
            });

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    updateTradeInButton();
                    updateSelectAllButtonState();
                });
            });

            typeFilter.addEventListener('change', () => {
                currentFilters.type = typeFilter.value;
                filterEquipment();
            });

            rarityFilter.addEventListener('change', () => {
                currentFilters.rarity = rarityFilter.value;
                filterEquipment();
            });

            foilFilter.onchange = filterEquipment;

            searchInput.addEventListener('input', () => {
                currentFilters.search = searchInput.value;
                filterEquipment();
            });

            // Initialize controls visibility and select all button state
            updateTradeInButton();
            updateSelectAllButtonState();

            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const selectedEquipment = Array.from(document.querySelectorAll('.trade-in-checkbox:checked'))
                    .map(checkbox => checkbox.value);

                if (selectedEquipment.length === 0) {
                    alert('Please select equipment to trade in');
                    return;
                }

                if (!confirm('Are you sure you want to trade in the selected equipment? This action cannot be undone.')) {
                    return;
                }

                try {
                    // Log the data being sent
                    console.log('Sending data:', {
                        equipment_ids: selectedEquipment
                    });

                    const response = await fetch('../backend/trade_in_equipment.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            equipment_ids: selectedEquipment
                        })
                    });

                    // Log the raw response
                    const rawResponse = await response.text();
                    console.log('Raw response:', rawResponse);

                    let data;
                    try {
                        data = JSON.parse(rawResponse);
                    } catch (parseError) {
                        console.error('Failed to parse response:', rawResponse);
                        throw new Error('Invalid JSON response from server');
                    }

                    if (data.error) {
                        throw new Error(data.error);
                    }

                    let message = 'Successfully traded in equipment!\n';
                    if (data.money_gained > 0) {
                        message += `Money gained: ${data.money_gained}\n`;
                    }
                    if (data.loot_tokens_gained > 0) {
                        message += `Loot tokens gained: ${data.loot_tokens_gained}`;
                    }
                    
                    alert(message);
                    window.location.reload();
                } catch (error) {
                    console.error('Error details:', error);
                    alert('Error: ' + error.message);
                }
            });

            const renameModal = document.getElementById('renameEquipmentModal');
            const renameForm = document.getElementById('renameEquipmentForm');
            const equipmentIdInput = document.getElementById('equipmentId');
            const newNameInput = document.getElementById('newName');

            window.showRenameEquipmentModal = function(equipmentId, currentName) {
                equipmentIdInput.value = equipmentId;
                newNameInput.value = currentName;
                renameModal.style.display = 'block';
            };

            window.closeRenameModal = function() {
                renameModal.style.display = 'none';
            };

            // Close modal when clicking outside
            window.onclick = function(event) {
                if (event.target === renameModal) {
                    closeRenameModal();
                }
            };

            renameForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const equipmentId = equipmentIdInput.value;
                const newName = newNameInput.value.trim();

                if (!newName) {
                    alert('Please enter a new name');
                    return;
                }

                try {
                    const response = await fetch('../backend/rename_equipment.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            equipment_id: equipmentId,
                            new_name: newName
                        })
                    });

                    const data = await response.json();
                    
                    if (data.error) {
                        throw new Error(data.error);
                    }

                    // Update the equipment name in the UI
                    const equipmentCard = document.querySelector(`[data-equipment-id="${equipmentId}"]`);
                    if (equipmentCard) {
                        const nameElement = equipmentCard.querySelector('.equipment-name');
                        if (nameElement) {
                            nameElement.textContent = newName;
                        }
                    }

                    closeRenameModal();
                } catch (error) {
                    alert('Error: ' + error.message);
                }
            });

            let currentPage = 1;
            let isLoading = false;
            let hasMoreItems = true;
            const equipmentGrid = document.getElementById('equipmentGrid');
            const loadingIndicator = document.getElementById('loadingIndicator');

            async function loadMoreEquipment() {
                if (isLoading || !hasMoreItems) return;
                
                isLoading = true;
                loadingIndicator.style.display = 'block';
                
                try {
                    const response = await fetch(`equipment.php?page=${currentPage + 1}&per_page=20`);
                    const data = await response.text();
                    
                    const temp = document.createElement('div');
                    temp.innerHTML = data;
                    
                    const newCards = temp.querySelectorAll('.equipment-card');
                    
                    if (newCards.length === 0) {
                        hasMoreItems = false;
                    } else {
                        newCards.forEach(card => equipmentGrid.appendChild(card));
                        currentPage++;
                        
                        // Initialize event listeners for new cards
                        initializeNewCards(newCards);
                        
                        // Apply current filters to all equipment including new cards
                        filterEquipment();
                    }
                } catch (error) {
                    console.error('Error loading more equipment:', error);
                } finally {
                    isLoading = false;
                    loadingIndicator.style.display = 'none';
                }
            }

            function initializeNewCards(cards) {
                cards.forEach(card => {
                    const checkbox = card.querySelector('.trade-in-checkbox');
                    if (checkbox) {
                        checkbox.addEventListener('change', () => {
                            updateTradeInButton();
                            updateSelectAllButtonState();
                        });
                    }
                });
            }

            // Infinite scroll handler
            window.addEventListener('scroll', () => {
                if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 1000) {
                    loadMoreEquipment();
                }
            });
        });
    </script>
</body>
</html>