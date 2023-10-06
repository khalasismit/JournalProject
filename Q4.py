import os
path_to_check = r"D:/BCA/TYBCA"  
if os.path.exists(path_to_check) and os.path.isdir(path_to_check):
    print(f"'{path_to_check}' is an existing directory.") 
else:
    print(f"'{path_to_check}' does not exist or is not a directory.") 
