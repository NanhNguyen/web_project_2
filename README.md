Sau khi **clone** repository về máy và chỉnh sửa code, bạn có thể tạo một **pull request (PR)** lên GitHub bằng cách làm theo các bước sau:

---

### **📌 Bước 1: Điều hướng vào thư mục dự án**
Mở Terminal/Git Bash và di chuyển vào thư mục của repo:
```bash
cd đường_dẫn_tới_repo
```

---

### **📌 Bước 2: Kiểm tra nhánh hiện tại**
```bash
git branch
```
Nếu bạn đang ở nhánh `main`, thì **nên tạo một nhánh mới** trước khi push để làm PR.

---

### **📌 Bước 3: Tạo một nhánh mới (khuyến nghị)**
```bash
git checkout -b ten-nhanh-moi
```
Ví dụ:
```bash
git checkout -b feature-login
```

---

### **📌 Bước 4: Thêm và commit thay đổi**
Sau khi chỉnh sửa code, chạy:
```bash
git add .
git commit -m "Mô tả thay đổi"
```
Ví dụ:
```bash
git commit -m "Thêm chức năng đăng nhập"
```

---

### **📌 Bước 5: Push lên GitHub**
```bash
git push origin ten-nhanh-moi
```
Ví dụ:
```bash
git push origin feature-login
```

---

### **📌 Bước 6: Tạo Pull Request trên GitHub**
1. Vào repository trên GitHub.
2. Bạn sẽ thấy thông báo: **Compare & pull request**, nhấn vào đó.
3. Chọn **nhánh chính (main hoặc develop)** làm nhánh gốc để merge vào.
4. Nhập mô tả chi tiết về thay đổi của bạn.
5. Nhấn **Create pull request**.

---

### **📌 Bước 7: Chờ Review & Merge**
- Chủ repo hoặc người có quyền review sẽ kiểm tra PR của bạn.
- Nếu cần chỉnh sửa, họ có thể comment để bạn cập nhật lại code.
- Khi được chấp nhận, PR sẽ được merge vào nhánh chính.

---

### **💡 Lưu ý**
- **Không push trực tiếp lên `main`**, trừ khi dự án cho phép.
- Nếu repo có **quy trình review code (code review process)**, hãy kiểm tra guideline của nhóm.
- Có thể cập nhật pull request bằng cách **push thêm commit** lên nhánh hiện tại.

Sau khi PR được merge, bạn có thể **cập nhật lại local repo** bằng:
```bash
git checkout main
git pull origin main
```

