<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class EmpReg extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="empreg";
    protected $primaryKey = 'EmpNo';

    public $timestamps = false;
    protected $fillable = [
        'EmpNo'
        ,'AccNo'
        ,'Date'
        ,'EmpName'
        ,'Gender'
        ,'DesignationCode'
        ,'Designation'
        ,'DepartmentCode'
        ,'Department'
        ,'NICNo'
        ,'PersonalNo'
        ,'DOBirth'
        ,'EduQual'
        ,'Subject'
        ,'Salary'
        ,'PTCLNO'
        ,'CellNo'
        ,'Emailadd'
        ,'DateOfService'
        ,'DateOfCollege'
        ,'MaritalStatus'
        ,'PostalAdd'
        ,'Comments'
        ,'MachineCode'
        ,'PIC'
        ,'BranchCode'
        ,'Inactive'
        ,'ActCode'
        ,'CreditActCode'
        ,'CreditActName'
        ,'EmpBranchCode'
        ,'RDebitActCode'
        ,'RDebitActName'
        ,'RCreditActCode'
        ,'RCreditActName'
        ,'PayTypeCode'
        ,'Paytype'
        ,'PDFPath'
    ];
}
