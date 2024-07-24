CREATE DATABASE hgeneral
USE [hgeneral]
GO

/****** Object:  Table [dbo].[paciente]    Script Date: 28/10/2022 01:50:16 p. m. ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[paciente](
	[id_paciente] [int] IDENTITY(1,1) NOT NULL,
	[nss] [varchar](30) NULL,
	[apellido_pat] [varchar](50) NULL,
	[apellido_mat] [varchar](50) NULL,
	[nombre] [varchar](50) NULL,
	[fecha_nacimiento] [date] NULL,
 CONSTRAINT [PK_paciente] PRIMARY KEY CLUSTERED 
(
	[id_paciente] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO


