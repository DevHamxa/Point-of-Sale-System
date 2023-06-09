USE [master]
GO
/****** Object:  Database [pos]    Script Date: 4/6/2023 11:33:25 AM ******/
CREATE DATABASE [pos]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'pos', FILENAME = N'D:\Apps_Software\MS_SQL_Server\MSSQL15.SQLEXPRESS\MSSQL\DATA\pos.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'pos_log', FILENAME = N'D:\Apps_Software\MS_SQL_Server\MSSQL15.SQLEXPRESS\MSSQL\DATA\pos_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT
GO
ALTER DATABASE [pos] SET COMPATIBILITY_LEVEL = 150
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [pos].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [pos] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [pos] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [pos] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [pos] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [pos] SET ARITHABORT OFF 
GO
ALTER DATABASE [pos] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [pos] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [pos] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [pos] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [pos] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [pos] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [pos] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [pos] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [pos] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [pos] SET  DISABLE_BROKER 
GO
ALTER DATABASE [pos] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [pos] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [pos] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [pos] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [pos] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [pos] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [pos] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [pos] SET RECOVERY FULL 
GO
ALTER DATABASE [pos] SET  MULTI_USER 
GO
ALTER DATABASE [pos] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [pos] SET DB_CHAINING OFF 
GO
ALTER DATABASE [pos] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [pos] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [pos] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [pos] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
ALTER DATABASE [pos] SET QUERY_STORE = OFF
GO
USE [pos]
GO
/****** Object:  Schema [m2ss]    Script Date: 4/6/2023 11:33:25 AM ******/
CREATE SCHEMA [m2ss]
GO
/****** Object:  Table [dbo].[admin]    Script Date: 4/6/2023 11:33:25 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[admin](
	[AD_ID] [int] IDENTITY(1007,1) NOT NULL,
	[AD_F_Name] [nvarchar](50) NOT NULL,
	[AD_L_Name] [nvarchar](50) NOT NULL,
	[AD_Email] [nvarchar](50) NOT NULL,
	[AD_Pass] [nvarchar](50) NOT NULL,
	[AD_Contact] [nvarchar](25) NOT NULL,
	[No_of_Cashier] [int] NOT NULL,
 CONSTRAINT [PK_admin_AD_ID] PRIMARY KEY CLUSTERED 
(
	[AD_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[cashier]    Script Date: 4/6/2023 11:33:25 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[cashier](
	[CA_ID] [int] IDENTITY(114,1) NOT NULL,
	[CA_F_Name] [nvarchar](50) NOT NULL,
	[CA_L_Name] [nvarchar](50) NOT NULL,
	[CA_Email] [nvarchar](50) NOT NULL,
	[CA_Pass] [nvarchar](50) NOT NULL,
	[CA_Address] [nvarchar](50) NOT NULL,
	[CA_Contact] [nvarchar](25) NOT NULL,
 CONSTRAINT [PK_cashier_CA_ID] PRIMARY KEY CLUSTERED 
(
	[CA_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY],
 CONSTRAINT [cashier$CA_Email] UNIQUE NONCLUSTERED 
(
	[CA_Email] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY],
 CONSTRAINT [cashier$CA_Pass] UNIQUE NONCLUSTERED 
(
	[CA_Pass] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[product]    Script Date: 4/6/2023 11:33:25 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[product](
	[Product_ID] [int] IDENTITY(55,1) NOT NULL,
	[Supplier_Code] [nvarchar](50) NOT NULL,
	[Name] [nvarchar](50) NOT NULL,
	[Unit_price] [float] NOT NULL,
	[Unit_in_Stock] [int] NOT NULL,
	[Discount_Percentage] [float] NOT NULL,
	[Re_Order_Level] [int] NOT NULL,
	[Category_ID] [int] NOT NULL,
	[Unit_ID] [int] NOT NULL,
	[SM_ID] [int] NOT NULL,
 CONSTRAINT [PK_product_Product_ID] PRIMARY KEY CLUSTERED 
(
	[Product_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[product_category]    Script Date: 4/6/2023 11:33:25 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[product_category](
	[Category_ID] [int] IDENTITY(3,1) NOT NULL,
	[Name] [nvarchar](50) NOT NULL,
 CONSTRAINT [PK_product_category_Category_ID] PRIMARY KEY CLUSTERED 
(
	[Category_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[product_unit]    Script Date: 4/6/2023 11:33:25 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[product_unit](
	[Unit_ID] [int] IDENTITY(24,1) NOT NULL,
	[Name] [nvarchar](50) NOT NULL,
 CONSTRAINT [PK_product_unit_Unit_ID] PRIMARY KEY CLUSTERED 
(
	[Unit_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[purchase_order]    Script Date: 4/6/2023 11:33:25 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[purchase_order](
	[Purchase_Order_ID] [int] IDENTITY(202,1) NOT NULL,
	[Product_ID] [int] NOT NULL,
	[Supplier_Code] [nvarchar](50) NOT NULL,
	[Quantity] [int] NOT NULL,
	[Order_Date] [datetime2](0) NOT NULL,
	[SM_ID] [int] NOT NULL,
	[ID] [int] NOT NULL,
 CONSTRAINT [PK_purchase_order_Purchase_Order_ID] PRIMARY KEY CLUSTERED 
(
	[Purchase_Order_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[receive_product]    Script Date: 4/6/2023 11:33:25 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[receive_product](
	[Receive_Product_ID] [int] IDENTITY(1,1) NOT NULL,
	[Supplier_Code] [nvarchar](50) NOT NULL,
	[Product_ID] [int] NOT NULL,
	[Quantity] [int] NOT NULL,
	[Unit_Price] [float] NOT NULL,
	[Total] [float] NOT NULL,
	[Received_Date] [datetime2](0) NOT NULL,
 CONSTRAINT [PK_receive_product_Receive_Product_ID] PRIMARY KEY CLUSTERED 
(
	[Receive_Product_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[sales]    Script Date: 4/6/2023 11:33:25 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[sales](
	[Sales_ID] [int] IDENTITY(624,1) NOT NULL,
	[CA_ID] [int] NOT NULL,
	[date_t] [datetime2](0) NOT NULL,
	[Total] [float] NOT NULL,
 CONSTRAINT [PK_sales_Sales_ID] PRIMARY KEY CLUSTERED 
(
	[Sales_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[status_order]    Script Date: 4/6/2023 11:33:25 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[status_order](
	[ID] [int] IDENTITY(102,1) NOT NULL,
	[Status] [smallint] NOT NULL,
 CONSTRAINT [PK_status_order_ID] PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[stock_manager]    Script Date: 4/6/2023 11:33:25 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[stock_manager](
	[SM_ID] [int] IDENTITY(13,1) NOT NULL,
	[SM_F_Name] [nvarchar](50) NOT NULL,
	[SM_L_Name] [nvarchar](50) NOT NULL,
	[SM_Email] [nvarchar](50) NOT NULL,
	[SM_Pass] [nvarchar](50) NOT NULL,
	[SM_Address] [nvarchar](50) NOT NULL,
	[SM_Contact] [nvarchar](25) NOT NULL,
 CONSTRAINT [PK_stock_manager_SM_ID] PRIMARY KEY CLUSTERED 
(
	[SM_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[supplier]    Script Date: 4/6/2023 11:33:25 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[supplier](
	[Supplier_Code] [nvarchar](50) NOT NULL,
	[Name] [nvarchar](50) NOT NULL,
	[Contact] [nvarchar](50) NOT NULL,
	[Email] [nvarchar](50) NOT NULL,
	[Address] [nvarchar](50) NOT NULL,
 CONSTRAINT [PK_supplier_Supplier_Code] PRIMARY KEY CLUSTERED 
(
	[Supplier_Code] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Temporary_Sale]    Script Date: 4/6/2023 11:33:25 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Temporary_Sale](
	[Temp_ID] [int] IDENTITY(1,1) NOT NULL,
	[Product_ID] [int] NULL,
	[Name] [nvarchar](50) NOT NULL,
	[Price] [float] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Temp_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Index [Category_ID]    Script Date: 4/6/2023 11:33:25 AM ******/
CREATE NONCLUSTERED INDEX [Category_ID] ON [dbo].[product]
(
	[Category_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [SM_ID]    Script Date: 4/6/2023 11:33:25 AM ******/
CREATE NONCLUSTERED INDEX [SM_ID] ON [dbo].[product]
(
	[SM_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [Supplier_Code]    Script Date: 4/6/2023 11:33:25 AM ******/
CREATE NONCLUSTERED INDEX [Supplier_Code] ON [dbo].[product]
(
	[Supplier_Code] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [Unit_ID]    Script Date: 4/6/2023 11:33:25 AM ******/
CREATE NONCLUSTERED INDEX [Unit_ID] ON [dbo].[product]
(
	[Unit_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [ID]    Script Date: 4/6/2023 11:33:25 AM ******/
CREATE NONCLUSTERED INDEX [ID] ON [dbo].[purchase_order]
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [Product_ID]    Script Date: 4/6/2023 11:33:25 AM ******/
CREATE NONCLUSTERED INDEX [Product_ID] ON [dbo].[purchase_order]
(
	[Product_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [SM_ID]    Script Date: 4/6/2023 11:33:25 AM ******/
CREATE NONCLUSTERED INDEX [SM_ID] ON [dbo].[purchase_order]
(
	[SM_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [Supplier_Code]    Script Date: 4/6/2023 11:33:25 AM ******/
CREATE NONCLUSTERED INDEX [Supplier_Code] ON [dbo].[purchase_order]
(
	[Supplier_Code] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [Product_ID]    Script Date: 4/6/2023 11:33:25 AM ******/
CREATE NONCLUSTERED INDEX [Product_ID] ON [dbo].[receive_product]
(
	[Product_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [Supplier_Code]    Script Date: 4/6/2023 11:33:25 AM ******/
CREATE NONCLUSTERED INDEX [Supplier_Code] ON [dbo].[receive_product]
(
	[Supplier_Code] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [CA_ID]    Script Date: 4/6/2023 11:33:25 AM ******/
CREATE NONCLUSTERED INDEX [CA_ID] ON [dbo].[sales]
(
	[CA_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
ALTER TABLE [dbo].[product]  WITH NOCHECK ADD  CONSTRAINT [product$product_ibfk_1] FOREIGN KEY([SM_ID])
REFERENCES [dbo].[stock_manager] ([SM_ID])
GO
ALTER TABLE [dbo].[product] CHECK CONSTRAINT [product$product_ibfk_1]
GO
ALTER TABLE [dbo].[product]  WITH NOCHECK ADD  CONSTRAINT [product$product_ibfk_2] FOREIGN KEY([Category_ID])
REFERENCES [dbo].[product_category] ([Category_ID])
GO
ALTER TABLE [dbo].[product] CHECK CONSTRAINT [product$product_ibfk_2]
GO
ALTER TABLE [dbo].[product]  WITH NOCHECK ADD  CONSTRAINT [product$product_ibfk_3] FOREIGN KEY([Unit_ID])
REFERENCES [dbo].[product_unit] ([Unit_ID])
GO
ALTER TABLE [dbo].[product] CHECK CONSTRAINT [product$product_ibfk_3]
GO
ALTER TABLE [dbo].[product]  WITH NOCHECK ADD  CONSTRAINT [product$product_ibfk_4] FOREIGN KEY([Supplier_Code])
REFERENCES [dbo].[supplier] ([Supplier_Code])
GO
ALTER TABLE [dbo].[product] CHECK CONSTRAINT [product$product_ibfk_4]
GO
ALTER TABLE [dbo].[purchase_order]  WITH NOCHECK ADD  CONSTRAINT [purchase_order$purchase_order_ibfk_1] FOREIGN KEY([Product_ID])
REFERENCES [dbo].[product] ([Product_ID])
GO
ALTER TABLE [dbo].[purchase_order] CHECK CONSTRAINT [purchase_order$purchase_order_ibfk_1]
GO
ALTER TABLE [dbo].[purchase_order]  WITH NOCHECK ADD  CONSTRAINT [purchase_order$purchase_order_ibfk_3] FOREIGN KEY([SM_ID])
REFERENCES [dbo].[stock_manager] ([SM_ID])
GO
ALTER TABLE [dbo].[purchase_order] CHECK CONSTRAINT [purchase_order$purchase_order_ibfk_3]
GO
ALTER TABLE [dbo].[purchase_order]  WITH NOCHECK ADD  CONSTRAINT [purchase_order$purchase_order_ibfk_4] FOREIGN KEY([ID])
REFERENCES [dbo].[status_order] ([ID])
GO
ALTER TABLE [dbo].[purchase_order] CHECK CONSTRAINT [purchase_order$purchase_order_ibfk_4]
GO
ALTER TABLE [dbo].[purchase_order]  WITH NOCHECK ADD  CONSTRAINT [purchase_order$purchase_order_ibfk_5] FOREIGN KEY([Supplier_Code])
REFERENCES [dbo].[supplier] ([Supplier_Code])
GO
ALTER TABLE [dbo].[purchase_order] CHECK CONSTRAINT [purchase_order$purchase_order_ibfk_5]
GO
ALTER TABLE [dbo].[receive_product]  WITH NOCHECK ADD  CONSTRAINT [receive_product$receive_product_ibfk_2] FOREIGN KEY([Product_ID])
REFERENCES [dbo].[product] ([Product_ID])
GO
ALTER TABLE [dbo].[receive_product] CHECK CONSTRAINT [receive_product$receive_product_ibfk_2]
GO
ALTER TABLE [dbo].[receive_product]  WITH NOCHECK ADD  CONSTRAINT [receive_product$receive_product_ibfk_4] FOREIGN KEY([Supplier_Code])
REFERENCES [dbo].[supplier] ([Supplier_Code])
GO
ALTER TABLE [dbo].[receive_product] CHECK CONSTRAINT [receive_product$receive_product_ibfk_4]
GO
ALTER TABLE [dbo].[sales]  WITH NOCHECK ADD  CONSTRAINT [sales$sales_ibfk_1] FOREIGN KEY([CA_ID])
REFERENCES [dbo].[cashier] ([CA_ID])
GO
ALTER TABLE [dbo].[sales] CHECK CONSTRAINT [sales$sales_ibfk_1]
GO
ALTER TABLE [dbo].[Temporary_Sale]  WITH CHECK ADD FOREIGN KEY([Product_ID])
REFERENCES [dbo].[product] ([Product_ID])
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'dbo.admin' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'admin'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'dbo.cashier' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'cashier'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'dbo.product' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'product'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'dbo.product_category' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'product_category'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'dbo.product_unit' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'product_unit'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'dbo.purchase_order' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'purchase_order'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'dbo.receive_product' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'receive_product'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'dbo.sales' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'sales'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'dbo.status_order' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'status_order'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'dbo.stock_manager' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'stock_manager'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'dbo.supplier' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'supplier'
GO
USE [master]
GO
ALTER DATABASE [pos] SET  READ_WRITE 
GO
