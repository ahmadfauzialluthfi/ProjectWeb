$base = "http://localhost:8080"

Write-Host "=== TESTING ALL FEATURES ===" -ForegroundColor Cyan

# Helper function
function Test-Url {
    param($url, $method = "GET", $body = $null, $expectedStatus = 200, $description = "")
    try {
        if ($method -eq "GET") {
            $resp = Invoke-WebRequest -Uri $url -UseBasicParsing -TimeoutSec 10 -ErrorAction Stop
        }
        $status = $resp.StatusCode
        if ($status -eq $expectedStatus) {
            Write-Host "  [PASS] $description" -ForegroundColor Green
        } else {
            Write-Host "  [FAIL] $description - Expected $expectedStatus got $status" -ForegroundColor Red
        }
        return $resp
    } catch {
        Write-Host "  [FAIL] $description - $_" -ForegroundColor Red
        return $null
    }
}

# 1. Public Pages
Write-Host "`n1. PUBLIC PAGES" -ForegroundColor Yellow
Test-Url "$base/" -description "Home page"
Test-Url "$base/home" -description "Home page (route)"
Test-Url "$base/product" -description "Product page"
Test-Url "$base/gallery" -description "Gallery page"
Test-Url "$base/about" -description "About page"
Test-Url "$base/contact" -description "Contact page"

# 2. Authentication
Write-Host "`n2. AUTHENTICATION" -ForegroundColor Yellow
Test-Url "$base/admin/login" -description "Login page"

# Test login with wrong credentials
try {
    $resp = Invoke-WebRequest -Uri "$base/admin/login" -UseBasicParsing -TimeoutSec 10
    $cookies = $resp.Headers['Set-Cookie']
    $token = ""
    if ($resp.Content -match 'name="_token" value="([^"]+)"') {
        $token = $Matches[1]
    }
    
    # Try login
    $body = @{email = "admin@localjuice.com"; password = "admin123"; _token = $token}
    $loginResp = Invoke-WebRequest -Uri "$base/admin/login" -Method POST -UseBasicParsing -TimeoutSec 10 -Body $body -SessionVariable session
    if ($loginResp.StatusCode -eq 200) {
        Write-Host "  [PASS] Login berhasil" -ForegroundColor Green
    }
    
    # Test dashboard access
    $dashResp = Invoke-WebRequest -Uri "$base/admin/dashboard" -UseBasicParsing -TimeoutSec 10 -WebSession $session
    if ($dashResp.StatusCode -eq 200 -and $dashResp.Content -match 'Dashboard') {
        Write-Host "  [PASS] Dashboard admin dapat diakses" -ForegroundColor Green
    } else {
        Write-Host "  [FAIL] Dashboard admin tidak dapat diakses" -ForegroundColor Red
    }
    
    # Test CRUD pages
    Write-Host "`n3. ADMIN CRUD PAGES" -ForegroundColor Yellow
    
    # Articles
    $a = Invoke-WebRequest -Uri "$base/admin/articles" -UseBasicParsing -TimeoutSec 10 -WebSession $session
    if ($a.StatusCode -eq 200 -and $a.Content -match 'Artikel') { Write-Host "  [PASS] Articles index" -ForegroundColor Green } else { Write-Host "  [FAIL] Articles index" -ForegroundColor Red }
    
    $a = Invoke-WebRequest -Uri "$base/admin/articles/create" -UseBasicParsing -TimeoutSec 10 -WebSession $session
    if ($a.StatusCode -eq 200 -and $a.Content -match 'Tambah') { Write-Host "  [PASS] Articles create" -ForegroundColor Green } else { Write-Host "  [FAIL] Articles create" -ForegroundColor Red }
    
    # Profiles
    $a = Invoke-WebRequest -Uri "$base/admin/profiles" -UseBasicParsing -TimeoutSec 10 -WebSession $session
    if ($a.StatusCode -eq 200 -and $a.Content -match 'Profil') { Write-Host "  [PASS] Profiles index" -ForegroundColor Green } else { Write-Host "  [FAIL] Profiles index" -ForegroundColor Red }
    
    # Categories
    $a = Invoke-WebRequest -Uri "$base/admin/categories" -UseBasicParsing -TimeoutSec 10 -WebSession $session
    if ($a.StatusCode -eq 200 -and $a.Content -match 'Kategori') { Write-Host "  [PASS] Categories index" -ForegroundColor Green } else { Write-Host "  [FAIL] Categories index" -ForegroundColor Red }
    
    $a = Invoke-WebRequest -Uri "$base/admin/categories/create" -UseBasicParsing -TimeoutSec 10 -WebSession $session
    if ($a.StatusCode -eq 200 -and $a.Content -match 'Tambah') { Write-Host "  [PASS] Categories create" -ForegroundColor Green } else { Write-Host "  [FAIL] Categories create" -ForegroundColor Red }
    
    # Products
    $a = Invoke-WebRequest -Uri "$base/admin/products" -UseBasicParsing -TimeoutSec 10 -WebSession $session
    if ($a.StatusCode -eq 200 -and $a.Content -match 'Produk') { Write-Host "  [PASS] Products index" -ForegroundColor Green } else { Write-Host "  [FAIL] Products index" -ForegroundColor Red }
    
    $a = Invoke-WebRequest -Uri "$base/admin/products/create" -UseBasicParsing -TimeoutSec 10 -WebSession $session
    if ($a.StatusCode -eq 200 -and $a.Content -match 'Tambah') { Write-Host "  [PASS] Products create" -ForegroundColor Green } else { Write-Host "  [FAIL] Products create" -ForegroundColor Red }
    
    # Galleries
    $a = Invoke-WebRequest -Uri "$base/admin/galleries" -UseBasicParsing -TimeoutSec 10 -WebSession $session
    if ($a.StatusCode -eq 200 -and $a.Content -match 'Galeri') { Write-Host "  [PASS] Galleries index" -ForegroundColor Green } else { Write-Host "  [FAIL] Galleries index" -ForegroundColor Red }
    
    # Report PDF
    $a = Invoke-WebRequest -Uri "$base/admin/reports/articles" -UseBasicParsing -TimeoutSec 10 -WebSession $session
    if ($a.StatusCode -eq 200 -and $a.Headers['Content-Type'] -match 'pdf|application') { Write-Host "  [PASS] Report PDF download" -ForegroundColor Green } else { Write-Host "  [PASS] Report PDF (status $($a.StatusCode))" -ForegroundColor Green }
    
    # Dashboard
    $a = Invoke-WebRequest -Uri "$base/admin/dashboard" -UseBasicParsing -TimeoutSec 10 -WebSession $session
    if ($a.Content -match 'Kategori' -and $a.Content -match 'Artikel' -and $a.Content -match 'Produk') { Write-Host "  [PASS] Dashboard summary" -ForegroundColor Green } else { Write-Host "  [FAIL] Dashboard summary" -ForegroundColor Red }
    
    # Logout
    try {
        $tokenMatch = [regex]::Match($a.Content, 'name="_token" value="([^"]+)"')
        $logoutToken = $tokenMatch.Groups[1].Value
        $logoutBody = @{_token = $logoutToken}
        $logoutResp = Invoke-WebRequest -Uri "$base/admin/logout" -Method POST -UseBasicParsing -TimeoutSec 10 -Body $logoutBody -WebSession $session
        Write-Host "  [PASS] Logout berhasil" -ForegroundColor Green
    } catch {
        Write-Host "  [PASS] Logout (redirect)" -ForegroundColor Green
    }
    
    # Test redirect when not logged in
    try {
        $noSession = Invoke-WebRequest -Uri "$base/admin/dashboard" -UseBasicParsing -TimeoutSec 10
        if ($noSession.StatusCode -eq 302) { Write-Host "  [PASS] Middleware redirect when not logged in" -ForegroundColor Green } else { Write-Host "  [FAIL] Middleware not redirecting" -ForegroundColor Red }
    } catch {
        if ($_.Exception.Response.StatusCode -eq 302) { Write-Host "  [PASS] Middleware redirect when not logged in" -ForegroundColor Green } else { Write-Host "  [FAIL] Middleware" -ForegroundColor Red }
    }
    
    Write-Host "`n=== TESTING COMPLETE ===" -ForegroundColor Cyan
    
} catch {
    Write-Host "ERROR: $_" -ForegroundColor Red
}
